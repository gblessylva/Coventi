<?php
/**
 * Template part for displaying the contact section on the index page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coventi_streaming
 */

?>

<div class="col-lg-7 left-hand">
    <h2>Take your brand to a global audience</h2>
    <br>
    <div class="info-space">
        <i class="bx bx-play-circle"></i><span>Enrich Audience Reach</span>
        <p>Expand the reach and coverage of your in-person events by opening it to a larger audience base.</p>
    </div>
    <div class="info-space">
        <i class="bx bx-book-bookmark"></i><span>Sell tickets online</span>
        <p>Use Coventi to customize your event, issue free/paid tickets, and recruit sponsors.</p>
    </div>
    <div class="info-space">
        <i class="bx bx-bar-chart"></i><span>Track results & ROI</span>
        <!-- <p>View and download your attendee data, chat transcripts, recordings, and more from your event.</p> -->
		<p> Track statistics and useful data of your events</p>
    </div>
</div>
<div class="col-lg-5 mt-4 mt-lg-0">
<form id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"  method="post" role="form" class="php-email-form">
    <h2>Tell us about your Event</h2>
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
                <option value="video-production">Video production</option>
		    </select>
		</div>
		<div class="form-section">
			<label for="message"><?php echo esc_html( 'Message', 'coventi' ); ?></label>
			<textarea placeholder="Write Something" id="message" name="message"></textarea>
		</div>
				
		<div class="d-grid gap-2">
			<input type="submit" id="contact-form-submit" value="<?php echo esc_attr( 'Submit', 'coventi' ); ?>">
		</div>
    </form>
</div>
