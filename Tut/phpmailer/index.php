
<?php
  $subject = "Test mail";
  $to_email = "enagantisainath@gmail.com";
  $to_fullname = "to Doe";
  $from_email = "brinenectar.2016@gmail.com";
  $from_fullname = "from Doe";
  $headers  = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=utf-8\r\n";
  // Additional headers
  // This might look redundant but some services REALLY favor it being there.
  $headers .= "To: $to_fullname <$to_email>\r\n";
  $headers .= "From: $from_fullname <$from_email>\r\n";
  $message = "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\">\r\n
  <head>\r\n
    <title>Hello Test</title>\r\n
  </head>\r\n
  <body>\r\n
    <p></p>\r\n
    <p style=\"color: #00CC66; font-weight:600; font-style: italic; font-size:14px; float:left; margin-left:7px;\">
    You have received an inquiry from your website.  Please review the contact information below.</p>\r\n
  </body>\r\n
  </html>";
  

  mail($to_email, $subject, $message, $headers);
  echo "j";
  ?>