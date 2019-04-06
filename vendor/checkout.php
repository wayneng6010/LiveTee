<?php
	session_start();
	require_once '../conn.php';

	use PayPal\Rest\ApiContext;
	use PayPal\Auth\OAuthTokenCredential;
	use PayPal\Api\Payer;
	use PayPal\Api\Item;
	use PayPal\Api\Details;
	use PayPal\Api\ItemList;
	use PayPal\Api\Amount;
	use PayPal\Api\Transaction;
	use PayPal\Api\RedirectUrls;
	use PayPal\Api\Payment;
	use PayPal\Exception\PayPalConnectionException;

	require 'app/start.php';

	if(!isset($_POST['checkout'])) {
		die();
	}

	if(isset($_POST['checkout'])){
		if (isset($_SESSION['uID'])){
			if(!empty($_POST['cartID'])){
				$uid1 = $_SESSION['uID'];
				
				$payer = new Payer();
				$payer->setPaymentMethod('paypal');

				$items = array();
				$total = 0;
				$price = 0;

				$_SESSION['post_cartID'] = array();
				// $_SESSION['post_cartID'] = $_POST['cartID'];

				foreach($_POST['cartID'] as $i=>$checked){

					array_push($_SESSION['post_cartID'], $checked);

					$sql1 = "SELECT * FROM cart, item WHERE cart.Cart_ItemID = item.Item_ID AND `User_ID` = '$uid1' AND `Cart_ID` = '$checked'";
					$result1 = mysqli_query($link,$sql1);
					$row1 = mysqli_fetch_assoc($result1);
					$Order_ItemID = $row1['Cart_ItemID'];
					$Order_ItemName = $row1['Item_Name'];
					$Order_ItemPrice = $row1['Item_Price'];
					$Order_ItemSize = $row1['Cart_ItemSize'];
					$Order_ItemQuan = $row1['Cart_ItemQuan'];

					$total += $Order_ItemPrice * $Order_ItemQuan;
					$price += $Order_ItemPrice * $Order_ItemQuan;

					$item[$i] = new Item();
					$item[$i]->setName($Order_ItemName)
							->setID($Order_ItemID)
							->setCurrency('AUD')
							->setQuantity($Order_ItemQuan)
							->setSize($Order_ItemSize)
							->setPrice($Order_ItemPrice);

					$items[] = $item[$i];
				}

				$itemList = new ItemList();
				$itemList->setItems($items);
				// print_r($itemList);

				$details = new Details();
				$details->setSubtotal($price);
				// print_r($details);

				$amount = new Amount();
				$amount->setCurrency('AUD')
						->setTotal($total)
						->setDetails($details);

				$transaction = new Transaction();
				$transaction->setAmount($amount)
							->setDescription('Pay for Livetee')
							->setInvoiceNumber(uniqid());

				$redirectUrls = new RedirectUrls();
				$redirectUrls->setReturnUrl('http://localhost/FYP/vendor/pay.php?success=true')
							->setCancelUrl('http://localhost/FYP/vendor/pay.php?success=false');

				$payment = new Payment();
				$payment->setIntent('sale')
						->setPayer($payer)
						->setRedirectUrls($redirectUrls)
						->setTransactions([$transaction]);

				try {
					$payment->create($paypal);
				} catch (Exception $e) {
					die($e);
				}
// try {
// 					$payment->create($paypal);
// } catch (PayPal\Exception\PayPalConnectionException $ex) {
//     echo $ex->getCode(); // Prints the Error Code
//     echo $ex->getData()."<br><br>"; // Prints the detailed error message 
//     die($ex);
// } catch (Exception $ex) {
//     die($ex);
// }
				$approvalUrl = $payment->getApprovalLink();
				header("LOcation: {$approvalUrl}");

			} else {
				// echo "<script>alert('No item selected.')</script>";
				// // header("Location: ../userCart.php");
				echo "<script>alert('No item selected.');
					window.location='../userCart.php';
				</script>";
			}
		}
	}
?>