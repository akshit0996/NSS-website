<?php 
sleep(2);
//Sanitize incoming data and store in variable
$name = trim(stripslashes(htmlspecialchars($_POST['name'])));	  		
$email = trim(stripslashes(htmlspecialchars($_POST['email'])));
$message = trim(stripslashes(htmlspecialchars($_POST['message'])));	    
$humancheck = $_POST['humancheck'];
$honeypot = $_POST['honeypot'];

if ($honeypot == 'http://' && empty($humancheck)) {	
		
		//Validate data and return success or error message
		$error_message = '';	
		$reg_exp = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,4}$/";
		
		if (!preg_match($reg_exp, $email)) {
				    
					$error_message .= "<p>A valid email address is required.</p>";			   
		}
		if (empty($name)) {
				   
				    $error_message .= "<p>Please provide your name.</p>";			   
		}			
		if (empty($message)) {
					
					$error_message .= "<p>A message is required.</p>";
		}		
		if (!empty($error_message)) {
					$return['error'] = true;
					$return['msg'] = "<h3>Oops! The request was successful but your form is not filled out correctly.</h3>".$error_message;					
					echo json_encode($return);
					exit();
		} else {
							  
			$return['error'] = false;
			$return['msg'] = "<p>Thanks for your feedback " .$name .".</p>"; 
			echo json_encode($return);
		  }		
} else {
	
	$return['error'] = true;
	$return['msg'] = "<h3>Oops! There was a problem with your submission. Please try again.</h3>";	
	echo json_encode($return);
}
	
?> 

