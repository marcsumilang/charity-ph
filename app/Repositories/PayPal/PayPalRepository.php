<?php namespace App\Repositories\PayPal;

use App\Repositories\PayPal\Contracts\PayPalInterface;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PayPalRepository implements PayPalInterface {


	private $api_context;
	/**
	 * @var Payer
	 */
	private $payer;
	/**
	 * @var Item
	 */
	private $item;

	private $items = [];
	/**
	 * @var ItemList
	 */
	private $itemList;
	/**
	 * @var Details
	 */
	private $details;
	/**
	 * @var Amount
	 */
	private $amount;
	/**
	 * @var Transaction
	 */
	private $transaction;
	/**
	 * @var RedirectUrls
	 */
	private $redirectUrls;
	/**
	 * @var Payment
	 */
	private $payment;
	/**
	 * @var PaymentExecution
	 */
	private $paymentExecution;

	public function __construct(Payer $payer, Item $item, ItemList $itemList, Details $details, Amount $amount, Transaction $transaction, RedirectUrls $redirectUrls, Payment $payment,PaymentExecution $paymentExecution) {

		$payPalConfig = Config::get('paypal');

		$this->api_context = new ApiContext(new OAuthTokenCredential($payPalConfig['checkout']['client_id'], $payPalConfig['checkout']['secret']));
		$this->api_context->setConfig($payPalConfig['checkout']['settings']);
		$this->payer = $payer;
		$this->item = $item;
		$this->itemList = $itemList;
		$this->details = $details;
		$this->amount = $amount;
		$this->transaction = $transaction;
		$this->redirectUrls = $redirectUrls;
		$this->payment = $payment;
		$this->paymentExecution = $paymentExecution;
	}


	public function checkout($data) {

		$this->payer = $this->payer->setPaymentMethod('paypal');

		foreach ($data['items'] as $key => $value) {
			$this->items[] = $this->item->setName($value['name'])
				->setCurrency($data['currency'])
				->setQuantity($value['quantity'])
				->setPrice($value['price']);
		}

		$this->itemList = $this->itemList->setItems($this->items);

//		$this->details = $this->details->setSubtotal($data['subtotal'])
//			->setTax($data['tax'])
//			->setShipping($data['shipping_fee']);

		$this->amount = $this->amount->setCurrency($data['currency'])
			->setTotal($data['total'])
			->setDetails($this->details);

		$this->redirectUrls = $this->redirectUrls->setReturnUrl($data['return_url'])
			->setCancelUrl($data['cancel_url']);

		$this->transaction = $this->transaction->setAmount($this->amount)
//			->setItemList($this->itemList)
			->setDescription($data['description'])
			->setInvoiceNumber(uniqid());


		$this->payment = $this->payment->setIntent($data['intent'])
			->setPayer($this->payer)
			->setRedirectUrls($this->redirectUrls)
			->setTransactions(array($this->transaction));


//		return $this->payment;
		try {
			$this->payment->create($this->api_context);
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;

				return $err_data = json_decode($ex->getData(), true);
				exit;
			} else {

				die('Some error occur, sorry for inconvenient');
			}
		}


		$response = [];
		foreach ($this->payment->getLinks() as $link) {
			if ($link->getRel() == 'approval_url') {

				$response['redirect_url'] = $link->getHref();
				break;
			}
		}
		return $response;
	}






	/**
	 * @param $payer
	 * @param $redirectUrl
	 * @param $transaction
	 * @return Payment
	 */
	public function setPayment($data) {
		$response = new Payment();
		$response->setIntent($data['intent'])
			->setPayer($data['payer'])
			->setRedirectUrls($data['redirect_url'])
			->setTransactions($data['transaction']);

		return $response;
	}

	/**
	 * @return PaymentExecution
	 */
	public function paymentExecution($data) {


		$response = [];
		$this->payment = $this->payment->get($data['paymentId'], $this->api_context);
		$this->paymentExecution = $this->paymentExecution->setPayerId($this->payment->getPayer()->getPayerInfo()->getPayerId());
		$this->payment = $this->payment->execute($this->paymentExecution, $this->api_context);

		$response['status'] = $this->payment->getState() == 'approved' ? true : false;

		return $response;
	}


}