<?php
	define("TITLE", "Kontakt | Claus' Fine Dining");
	
	include('includes/header.php');
?>

	<div id="contact">
		<hr>
		
		<h2>Nehmen Sie Kontakt zu uns auf!</h2>
		

		<?php
	
		// Check for Header Injections
		function has_header_injection($str) {
			return preg_match( "/[\r\n]/", $str );
		}
		
		
		if (isset($_POST['contact_submit'])) {
			
			// Assign trimmed form data to variables
			// Note that the value within the $_POST array is looking for the HTML "name" attribute, i.e. name="email"
			$name	= trim($_POST['name']);
			$email	= trim($_POST['email']);
			$msg	= $_POST['message']; // no need to trim message
		
			// Check to see if $name or $email have header injections
			if (has_header_injection($name) || has_header_injection($email)) {
				
				die(); // If true, kill the script
				
			}
			
			if (!$name || !$email || !$msg) {
				echo '<h4 class="error">Alle Felder müssen ausgefüllt werden.</h4><a href="contact.php" class="b block">Gehe zurück und wiederhole den Vorgang.</a>';
				exit;
			}
			
			// Add the recipient email to a variable
			$to	= "claus.gebel@web.de";
			
			// Create a subject
			$subject = "$name hat eine Nachricht über Ihr Kontaktformular gesendet";
			
			// Construct the message
			$message .= "Name: $name\r\n";
			$message .= "Email: $email\r\n\r\n";
			$message .= "Message:\r\n$msg";
			
			// If the subscribe checkbox was checked
			if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe' ) {
			
				// Add a new line to the $message
				$message .= "\r\n\r\nBitte nehmen Sie $email in die Verteilerliste auf.\r\n";
				
			}
		
			$message = wordwrap($message, 72); // Keep the message neat n' tidy
		
			// Set the mail headers into a variable
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
			$headers .= "From: " . $name . " <" . $email . ">\r\n";
			$headers .= "X-Priority: 1\r\n";
			$headers .= "X-MSMail-Priority: High\r\n\r\n";
		
			
			// Send the email!
			mail($to, $subject, $message, $headers);
		?>
		
		<!-- Show success message after email has sent -->
		<h5>Danke für die Kontaktaufnahme mit Claus'!</h5>
		<p>Bitte warten Sie 24 Stunden auf eine Antwort.</p>
		<p><a href="/final" class="button block">&laquo; Zur Startseite gehen</a></p>
		
		<?php
			} else {
		?>

		<form method="post" action="" id="contact-form">
			<label for="name">Dein Name</label>
			<input type="text" id="name" name="name">
			
			<label for="email">Deine E-Mail-Adresse</label>
			<input type="email" id="email" name="email">
			
			<label for="message">und deine Nachricht</label>
			<textarea id="message" name="message"></textarea>
			
			<input type="checkbox" id="subscribe" value="Subscribe" name="subscribe"> <label for="subscribe">Anmeldung zum Newsletter</label>
			
			<input type="submit" class="button next" name="contact_submit" value="Nachricht senden">
		</form>
		
		<?php
			}
		?>
		<hr>
	</div><!-- contact -->
			
<?php include('includes/footer.php'); ?>
