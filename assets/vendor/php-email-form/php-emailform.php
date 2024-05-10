<?php
/**
 * Simple PHP email form library
 * https://bootstrapmade.com/php-email-form/
 */

class PHP_Email_Form
{
    function __construct()
    {
        $this->to = '';
        $this->from_name = '';
        $this->from_email = '';
        $this->subject = '';
        $this->smtp = array();
        $this->message = '';
        $this->headers = '';
        $this->success = '';
        $this->error = '';
    }

    function add_message($content, $label = '')
    {
        if ($label && $content) {
            $this->message .= "<b>$label:</b> $content<br>";
        }
    }

    function send()
    {
        $this->build_headers();

        if (mail($this->to, $this->subject, $this->message, $this->headers)) {
            $this->success = 'Message sent successfully!';
            return $this->success;
        } else {
            $this->error = 'Error! Unable to send message.';
            return $this->error;
        }
    }

    function build_headers()
    {
        $this->headers = "From: {$this->from_name} <{$this->from_email}>\r\n";
        $this->headers .= "Reply-To: {$this->from_email}\r\n";
        $this->headers .= "MIME-Version: 1.0\r\n";
        $this->headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    }
}
?>
