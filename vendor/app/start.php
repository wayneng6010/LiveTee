<?php
	require '../vendor/autoload.php';

	define('SITE_URL', 'http://localhost/FYP/userCart.php');

	// $paypal = new \PayPal\Rest\ApiContext(
	// 	new \PayPal\Auth\OAuthTokenCredential(
	// 		'AU3zNd41UyzRhUUKTetF54YpcK28ml_ehsFqYKgvBNszexwXAjouKF9yxcGmiCTO7TS36tuNnacpygvT',
	// 		'EGuSo1GIZaExN3vQY1_g8p-438H1SOVz77srDiB0slONK2Fm04WXVdBbNTQEFPYLaO9V8ZEGf_8NEmMC'
	// 	)
	// );

	$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'ASByM31BdC7i53ymeGJKj6riWFy18JJsvq7qH6iQ-3WpD6GuLie3NtGwv3bwCnGlL2qwig5I1xAIfgqw',
			'EEYQuXHaS100F8YgxLEJ-1eiNyQ8tgSHj1_bKIKoFIzEWgs1sJjGPRxBnECs93YrsF7KCdr7YWa1U5pY'
		)
	);

	$paypal->setConfig(
      array(
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG'
      )
	);
?>