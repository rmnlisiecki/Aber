<?php
if (isset($_POST['action'])) { // Checking for submit form
	
	$my_email = 'itisme2@wp.pl'; // Change with your email address
	
	if ($_POST['action'] == 'add') {
		$name		= trim(strip_tags(addslashes($_POST['name'])));
		$email		= trim(strip_tags(addslashes($_POST['email'])));
		$message	= trim(strip_tags(addslashes($_POST['message'])));
		$pattern	= '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

		if ($email != '' && $message != '') {
			if (preg_match($pattern, $email)) {
				$headers = 'From: ' . $email . "\r\n";
				if ($name == '') $subject = 'Message from Guest';
				else $subject = 'Message from ' . $name;
				
				mail($my_email, $subject, $message, $headers);
				
				echo 'success|<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>Dziękujemy! Wkrótce skontaktujemy się z Tobą.</div>';
			} else {
				echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>Prosimy o wpisanie prawidłowego adresu email.</div>';
			}
		} else {
			echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i></button>Prosimy o wypełnienie wszystkich pól.</div>';
		}
	}
} else { // Submit form false
	header('Location: index.html');	
}
?>