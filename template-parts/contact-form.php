<?php
$validation_messages = [];
$success_message = '';

if ( isset( $_POST['contact_form'] ) ) {
	
// 	$headers = 'From: '. 'gblessylva@gmail.com' . "\r\n" .
//     'Reply-To: ' . 'gblessylva@gmail.com' . "\r\n";

// 	wp_mail('xwondahmix@gmail.com','test', 'here we ge',  $headers);
    //Sanitize the data
    $full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
    $email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
    $message_content   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';
    $solution = isset( $_POST['solution'] ) ? sanitize_text_field( $_POST['solution'] ) : '';
    $phone_number = isset( $_POST['phone_number'] ) ? sanitize_text_field( $_POST['phone_number'] ) : '';

    //Validate the data
    if ( strlen( $full_name ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please enter a valid name.', 'coventi' );
    }

    if ( strlen( $email ) === 0 or
         ! is_email( $email ) ) {
        $validation_messages[] = esc_html__( 'Please enter a valid email address.', 'coventi' );
    }

    if ( strlen( $message ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please enter a valid message.', 'coventi' );
    }

    if ( strlen( $solution ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please select a solution.', 'coventi' );
    }
    if ( strlen( $phone_number ) === 0 ) {
        $validation_messages[] = esc_html__( 'Please enter a valid phone number.', 'coventi' );
    }

    //Send an email to the WordPress administrator if there are no validation errors
//     if ( empty( $validation_messages ) ) {

			

		
        // $admin_mail    = get_option( 'admin_email' );
		$admin_mail = 'info@coventi.co';
// 		$admin_mail = 'gblessylva@gmail.com';
        $subject = 'New ' .$solution. ' Request from ' . $full_name . ' via Coventi';
        $message = 'A new customer, with name '.$full_name .' and  phone number '.$phone_number . ' has dropped the following email comtent: <br> '. $message_content . ' - The email address of the customer is: ' . $email;
		$headers = array('Content-Type: text/html; charset=UTF-8');
        wp_mail( $admin_mail, $subject, $message, $headers );

        // Send a confirmation email to the customer
        $customer_mail    = $email;
        $customer_subject = 'Thank you for your message!';
//         $customer_message = 'Hi '. $full_name.', <br>';
		$customer_message = 'Thank you for your message. We will get back to you as soon as possible concerning your request for ' . $solution . '.';
	
		ob_start();
		include( get_template_directory() . '/template-parts/email-templates/new-request.php' );
// 		get_template_part('template-parts/email-templates', 'new-request');
		$content  = ob_get_contents();
 		ob_end_clean();
        wp_mail( $customer_mail, $customer_subject, $content, $headers );

        $success_message = esc_html__( 'Your message has been successfully sent.', 'coventi' );

		wp_redirect('/thank-you');

    }

// }

//Display the validation errors
if ( ! empty( $validation_messages ) ) {
    foreach ( $validation_messages as $validation_message ) {
        echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
    }
}

//Display the success message
if ( strlen( $success_message ) > 0 ) {
    echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
}

?>

<!-- Echo a container used that will be used for the JavaScript validation -->
<div id="validation-messages-container"></div>


<div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title coventi-contact-heading" id="staticBackdropLabel">Host events with Coventi</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form id="contact-form" action="<?php echo esc_url( '/thank-you' ); ?>" method="post">
				<input type="hidden" name="contact_form">
				<div class="form-section">
					<label for="full-name"><?php echo esc_html( 'Full Name', 'coventi' ); ?></label>
					<input type="text" id="full-name" placeholder="eg. John Doe" name="full_name">
				</div>
				<div class="form-section section-grid">
					<div class="section-container">
						<label for="email"><?php echo esc_html( 'Email', 'coventi' ); ?></label>
						<input type="email" placeholder="Eg. johndoe@gmail.com" id="email" name="email">
					</div>
					<div class="section-container">
						<label for="phone_number"><?php echo esc_html( 'Phone Number', 'coventi' ); ?></label>
						<input type="text" placeholder="+234-90000000" id="phone_number" name="phone_number">
					</div>
					
				</div>
				<div class="form-section">
					<label for="solution"><?php echo esc_html( 'Solution', 'coventi' ); ?></label>
					<select name="solution" id="solution">
						<option value="">Select a solution</option>
						<option value="live-stream">Live Stream</option>
						<option value="video-on-demand">Video On Demand</option>
						<option value="video-production">Video Production</option>

					</select>
				</div>
				<div class="form-section">
					<label for="message"><?php echo esc_html( 'Message', 'coventi' ); ?></label>
					<textarea placeholder="Write Something" id="message" name="message"></textarea>
				</div>
				
				<div class="form-section section-grid">
				<input type="submit" id="contact-form-submit" value="<?php echo esc_attr( 'Submit', 'coventi' ); ?>">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
			
	</div>
</div>