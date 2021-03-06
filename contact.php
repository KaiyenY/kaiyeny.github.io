<?php   
    if (isset($_POST["submit"])){ 
    	$to = "ray6190@g.rit.edu";
    	
			$from = empty(trim($_POST["email"])) ? "noemail@example.com" : sanitize_string($_POST["email"]);
			
			$subject = "Portfolio Inquiry";
			
			// #3 - same as above, except with the `message` form field
			$message = empty(trim($_POST["message"])) ?  "No message" : sanitize_string($_POST["message"]);
			
			// #4 - same as above, except with the `name` form field
			$name = empty(trim($_POST["name"])) ? "No name" : sanitize_string($_POST["name"]);
			
			// #5 - same as above, except with the `human` form field
			$human = empty(trim($_POST["human"])) ? "0" : sanitize_string($_POST["human"]);
			
			$headers = "From: $from" . "\r\n";
			
			// #6 - add the user's name to the end of the message
			$message .= "\n\n - $name";
			
			// #7 - if they know what 2+2 is, send the message
			if (intval($human) == 4){
			
				// #8 - mail returns false if the mail can't be sent
				$sent = mail($to,$subject,$message,$headers);
				
				//debug
				// if ($sent){
// 					echo "<p><b>You sent:</b> $message</p>";
// 				}else{
// 					echo "<p>Mail not sent!</p>";
// 				}
			}else{
				// echo "<p>You are either a 'bot, or bad at arithmetic!</p>";
			}
    }
    
    // go back to form page when we are done
		header("index.html"); // #10 - CHANGE THIS TO THE NAME OF YOUR FORM PAGE - AN ABSOLUTE URL WOULD BE EVEN BETTER
		exit();
    
    // #9 - this handy helper function is very necessary whenever
    // we are going to put user input onto a web page or a database
    // For example, if the user entered a <script> tag, and we added that <script> tag to our HTML page
    // they could perform an XSS attack (Cross-site scripting)
    function sanitize_string($string){
	$string = trim($string);
	$string = strip_tags($string);
	return $string;
    }
?>