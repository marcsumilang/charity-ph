<?php

return [
	"checkout" => [
		// set your paypal credential
//	'client_id' => 'AVCyO27zdBHdSw8rPP4ePsrqsrRsURY1GYf-rQFaFo1ip6eTGPRcwiPaf-DT56ZjKATnTt3Q-QG989bv',
//	'secret' => 'EFW6iff8Q7iXeXbYCctbRpFvUulOJ2OHf-8PTr_bmi9USdmnNBaDkJUDnUek5skSXcijXee-elNwnf-q',
		'client_id' => env('PAYPAL_MODE') == "live" ? env('PAYPAL_LIVE_CLIENT_ID') : env('PAYPAL_SANDBOX_CLIENT_ID'),
		'secret'    => env('PAYPAL_MODE') == "live" ? env('PAYPAL_LIVE_SECRET') : env('PAYPAL_SANDBOX_SECRET'),

		/**
		 * SDK configuration
		 */
		'settings'  => [
			/**
			 * Available option 'sandbox' or 'live'
			 */
			'mode'                   => env('PAYPAL_MODE'),

			/**
			 * Specify the max request time in seconds
			 */
			'http.ConnectionTimeOut' => 30,

			/**
			 * Whether want to log to a file
			 */
			'log.LogEnabled'         => true,

			/**
			 * Specify the file that want to write on
			 */
			'log.FileName'           => storage_path() . '/logs/paypal.log',

			/**
			 * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
			 *
			 * Logging is most verbose in the 'FINE' level and decreases as you
			 * proceed towards ERROR
			 */
			'log.LogLevel'           => 'FINE',
		],
	],
];