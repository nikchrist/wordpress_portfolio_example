<?php

//response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success"){
    	$response = "<div class='success'>{$message}</div>";
    } else {
    	$response = "<div class='error'>{$message}</div>";
    } 

  }

  //response messages
		$not_human       = "Human verification incorrect.";
		$missing_content = "Please supply all information.";
		$email_invalid   = "Email Address Invalid.";
		$message_unsent  = "Message was not sent. Try Again.";
		$message_sent    = "Thanks! Your message has been sent.";
 
		//user posted variables
		$name = $_POST['full_name'];
		$email = $_POST['f_email'];
		$message = $_POST['f_text'];
		$human = $_POST['f_human'];
 
		//php mailer variables
		$to = get_option('admin_email');
		$subject = "Someone sent a message from ".get_bloginfo('name');
		$headers = 'From: '. $email . "\r\n" .
		  'Reply-To: ' . $email . "\r\n";

		if(!$human == 0){
		  if($human != 3) my_contact_form_generate_response("error", $not_human); //not human!
		  else {
		 
		   //validate email
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			  my_contact_form_generate_response("error", $email_invalid);
			else //email is valid
			{
			  //validate if there is a name and message
				if(empty($name) || empty($message)){
				  my_contact_form_generate_response("error", $missing_content);
				}
				else //send mail
				{
				  $sent = wp_mail($to, $subject, strip_tags($message), $headers);
					if($sent) my_contact_form_generate_response("success", $message_sent); //message sent successfully
					else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
				}
			
       }
		  }
		}
		else if ($_POST['submitted']) {
			my_contact_form_generate_response("error", $missing_content);
		}


   get_header();


		while(have_posts()):the_post();

			?>

			<div class="row-fluid">
				<?php the_content(); ?>
			</div>

			<div class="row-fluid clearfix">
			<div class="text-center">

			<div id="respond">
			  <?php echo $response; ?>
			  <form action="<?php the_permalink(); ?>" method="post">

			    <p>
			    	 <label for="name">FULL NAME: 
			    	 <br>
			    	 <input type="text" name="name" value="<?php echo esc_attr($_POST['full_name']); ?>">
			    	 </label>
			    </p>

			    <p>
				    <label for="message_email">EMAIL: 
				    <br>
				    <input type="text" name="message_email" 
				    			 value="<?php echo esc_attr($_POST['f_email']); ?>">
				    </label>
			    </p>

			    <p>
				    <label for="message_text">MESSAGE:
				     <br>
				     <textarea type="text" name="text"><?php echo esc_textarea($_POST['f_text']); ?></textarea>
				    </label>
			    </p>
			    <p>
			    <label for="message_human">HUMAN VERIFICATION:  
				    <br>
				    <input type="text" style="width: 60px;" name="f_human"> + 2 = 5</label>
			    </p>

			    <input type="hidden" name="submitted" value="1">

			    <p><input type="submit" value="Send"></p>
			  </form>
			</div>


			</div>
			</div>

		<?php 

		endwhile;

	 get_footer();
?>