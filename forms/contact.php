<?php
  $receiving_email_address = 'bhautikvaghamshi81@gmail.com';

  if( file_exists($php_email_form = '../vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // $contact->smtp = array(
  //   'host' => 'smtp.elasticemail.com',
  //   'username' => 'bhautikvaghamshi81@gmail.com',
  //   'password' => '48F3FAFE4C58757BBDBDA594EFBEDFB4A5A4',
  //   'port' => '2525'
  // );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
