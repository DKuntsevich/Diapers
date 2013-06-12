<?php
	$owner_email = 'podguznik2014@yandex.ru';
	$headers = 'From: postmaster@dzd-nn.ru
Reply-To: postmaster@dzd-nn.ru
Content-Type: text/plain; charset=utf-8';
	$subject = 'A message from your site visitor ' . $_POST["name"] . ' <' . $_POST["email"] . '>';
	$messageBody = "";
	
	$messageBody .= 'Visitor: ' . $_POST["name"] . '' . "\n";
	$messageBody .= '' . "\n";
	$messageBody .= 'Email Address: ' . $_POST['email'] . '' . "\n";
	$messageBody .= '' . "\n";
	$messageBody .= 'Message: ' . $_POST['message'] . '' . "\n";

	$messageBody = strip_tags($messageBody);

	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo 'mail sent';
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>
