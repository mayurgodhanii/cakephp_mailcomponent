<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;

Class MailcontentComponent extends Component {

    public $components = array('Session', 'Email', 'Mailer');

    public function sendMailtoSale($inquiries) {
        $tr_class = "";
        $td_class = "padding: 7px;";

        $message = "";
        $message.="<table style='width:100%'>";

        $message.="<tr style='background: #eee;$tr_class'>";
        $message.="<td style='$td_class;width: 30%;'><strong>Name: </strong></td>";
        $message.="<td style='$td_class'>" . $inquiries->name . "</td>";
        $message.="</tr>";

        $message.="<tr style='$tr_class'>";
        $message.="<td style='$td_class'><strong>Email Address: </strong></td>";
        $message.="<td style='$td_class'>" . $inquiries->email . "</td>";
        $message.="</tr>";

        $message.="<tr style='background: #eee;$tr_class'>";
        $message.="<td style='$td_class'><strong>Contact Number: </strong></td>";
        $message.="<td style='$td_class'>" . $inquiries->contactno . "</td>";
        $message.="</tr>";

        $message.="<tr style='$tr_class'>";
        $message.="<td style='$td_class'><strong>Country: </strong></td>";
        $message.="<td style='$td_class'>" . $inquiries->country . "</td>";
        $message.="</tr>";

        $message.="<tr style='background: #eee;$tr_class'>";
        $message.="<td style='$td_class'><strong>Your Budget: </strong></td>";
        $message.="<td style='$td_class'>" . $inquiries->budget . "</td>";
        $message.="</tr>";

        $message.="<tr style='$tr_class'>";
        $message.="<td style='$td_class'><strong>Project Description: </strong></td>";
        $message.="<td style='$td_class'><div>" . strip_tags($inquiries->message) . "</div></td>";
        $message.="</tr>";
        
        $message.="</table>";
        
//        echo $message;exit;

        $to = Configure::read('SALES_EMAIL_ADDRESS');
        $subject = "Business Enquiry Approval from Admin - " . Configure::read('SITE_TITLE');
        $from = Configure::read('FROM_EMAIL_ADDRESS');
        $emailtemplate = "newtemplete";

        return $this->Mailer->sendMail($to, $subject, $from, $message, $attachments = null, $emailCofig = 'default', $emailtemplate);        
    }

}
