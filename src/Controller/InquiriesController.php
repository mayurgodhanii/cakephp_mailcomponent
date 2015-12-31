<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Core\Configure;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class InquiriesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Mailcontent');
        $this->loadComponent('Mailer');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
    }

    public function sendmail($id) {
        $inquiries = $this->Inquiries->get($id);

        $return = $this->Mailcontent->sendMailtoSale($inquiries);
        echo $return;
        exit;
    }

}
