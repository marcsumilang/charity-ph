<?php

namespace App\Providers;

use App\Repositories\PayPal\Contracts\PayPalInterface;

use App\Repositories\PayPal\PayPalRepository;
use Illuminate\Support\ServiceProvider;

class PayPalServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app->bind(PayPalInterface::class,PayPalRepository::class);
	}
}
