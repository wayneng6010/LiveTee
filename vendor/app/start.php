<?php
	require '../vendor/autoload.php';

	define('SITE_URL', 'http://localhost/FYP/userCart.php');

	$paypal = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
			'AU3zNd41UyzRhUUKTetF54YpcK28ml_ehsFqYKgvBNszexwXAjouKF9yxcGmiCTO7TS36tuNnacpygvT',
			'EGuSo1GIZaExN3vQY1_g8p-438H1SOVz77srDiB0slONK2Fm04WXVdBbNTQEFPYLaO9V8ZEGf_8NEmMC'
		)
	);
?>