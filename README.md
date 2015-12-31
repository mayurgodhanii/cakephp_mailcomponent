# Cakephp 3.0 Mail Component

Step 1: In your controller put below two lines
 public function initialize() {
        parent::initialize();
        $this->loadComponent('Mailcontent');
        $this->loadComponent('Mailer');
  }
  
Step 2: Calling mail function:

$this->Mailcontent->sendMailtoSale($data);

Here in data you can pass your appropriate data that you want to send in mail.

In Side MailcontentCoponent,

- You can add your custom function as like sendMailtoSale()
- Also you can set cc,bcc etc parameters @ $this->Mailer->sendMail($to, $subject, $from, $message, $attachments = null, $emailCofig = 'default', $emailtemplate);


If you want to change layout then you need add templete @ /src/Template/Email/html or /src/Template/Email/test , based on the mail type.


