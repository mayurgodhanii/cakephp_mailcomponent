<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Network\Email\Email;

Class MailerComponent extends Component {

    public $components = array('Session', 'Email');

    public function sendMail($to, $subject, $from, $message, $attachments = null, $emailCofig = 'default', $emailtemplate = 'default', $formate = 'html', $replyto = null, $cc = null, $bcc = null) {

        $email = new Email('default');

        $email->emailFormat($formate);
        $email->from(array($from => Configure::read('FROM_EMAIL_NAME')));
        $email->to($to);
        $email->cc($cc);
        $email->bcc($bcc);
        $email->replyTo($replyto);
        $email->subject($subject);
        $email->template($emailtemplate, 'default');

//        $email->attachments($attachments);
        if ($email->send($message)) {
            return true;
        } else {
            return false;
        }
    }
}
