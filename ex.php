<?php



	include ( "NexmoMessage.php" );


	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('62186ddc', 'fae24bdbdad634a8');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message.
	$info = $nexmo_sms->sendText( '', 'MyApp', 'Hello!' );

	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!

?>
