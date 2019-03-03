<?php
include 'verficationEP.php';
require_once 'conn.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "./PHPMailer/vendor/autoload.php";
$mail = new PHPMailer();

if(isset($_POST['add'])){
	$passChar = '0abc1def2ghi3ghi4jkl5mno6pqr7vwx8yzA9BCDEFGHIJKLMNOPQRSTUVWXYZ';
	$passCharLength = strlen($passChar);
	$randomPass = '';
	for ($x = 0; $x < 13; $x++) {
		$randomPass .= $passChar[rand(0, $passCharLength - 1)];
	}
	$randomPassHashed = password_hash($randomPass, PASSWORD_DEFAULT);
	$fullname = $_POST['fname'];
	$fullname = mysqli_real_escape_string($link,$fullname);
	$fullname = htmlentities($fullname, ENT_QUOTES, "UTF-8");
	$email = $_POST['email'];
	$role = $_POST['role'];
	$sql = "INSERT INTO staff VALUES(null,'$email','$fullname', true, '$randomPassHashed','$role', null, 0, now())";
	
	if($result=mysqli_query($link,$sql)){

		echo "<script>alert('Added Successfully')</script>";

		try{
				// $mail->SMTPDebug = 2; //not nessasary .. use to find our bug
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 587;
				$mail->SMTPSecure = "tls"; //Enable TLS encryption
				$mail->IsSMTP();
				$mail->SMTPAuth = true;

				$sender_email = "wayne.ng6010@gmail.com"; //Your gmail
				$mail->Username = $sender_email;
				$mail->Password = "wficihgrnrwatcth"; //Your App Password 

				$unameUpper = strtoupper($_POST['fname']);
				$fname = $_POST['fname'];
				$query1 = "SELECT staff_Email FROM staff WHERE staff_Name = '$fname';";
				$result1 = mysqli_query($link,$query1);

				while($row1 = mysqli_fetch_assoc($result1)){
					$email = $row1['staff_Email'];
				}		

				$to = $email; //Recipient's gmail
				$name = $fname; //Recipient's name
				$mail->From = $sender_email; //Sender's email
				$mail->FromName = "WAYNE NG"; //Sender's name
				$mail->AddAddress($to, $name);
				$mail->AddReplyTo($sender_email, "WAYNE NG");


				$query2 = "UPDATE staff
				SET staff_Password='$randomPassHashed'
				WHERE staff_Name = '$fname';";
				$result2 = mysqli_query($link,$query2);

				$content = "<div style='display: flex;align-items: center;background-color:#2e4f84; width:100%; height: 30px; color: white; padding-left: 2rem;'><p style='display: flex;align-items: center; letter-spacing: 5px; line-height: .5;'>LIVETEE</p></div><div style= 'background-color:#f1f1f1; padding: 1rem 2rem; margin-top:1rem;font-family:Segoe UI; width: 100%;'><p>Dear $fullname,</p> <p></p> <p>Here is your account to login LIVETEE staff account!</p> <p style='margin-left: 1rem'>User name: <strong>$email</strong></p> <p style='margin-left: 1rem'>Password: <strong>&nbsp;&nbsp;$randomPass</strong></p> <span style='background: #000; font-size: 12px; color:#fff;'>* Please do not leak out your account.</span><br><br>Enjoy!<br>The LIVETEE Team </div> <br>";

				$mail->isHTML(true);
				$mail->WordWrap = 50;
				$mail->Subject = "LIVETEE Backend System Registration";
				$mail->Body = $content;

				if($mail->Send()){
					echo '<script>alert("Email successfully sent")</script>';
					header("Refresh:0");
				}
			}
			catch (Exception $e){
				echo "Email could not be sent.<br>";
				echo "Mailer Error: " . $email->ErrorInfor;
				header("Refresh:0");
			}
		}

		else{
			echo "<script>alert('Email has been registered before')</script>";
		}
	}

	?>