<?php
	$owner_email = 'podguznik2014@yandex.ru';
	$headers = 'From:' . $_POST["email"];
	$subject = 'A message from your site visitor ' . $_POST["name"];
	$messageBody = "";
	
	$messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
	$messageBody .= '<br>' . "\n";
	$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
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
