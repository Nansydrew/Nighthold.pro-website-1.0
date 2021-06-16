<?php


namespace App\Services\Soap;

use SoapClient;
use SoapFault;
use SoapParam;

class Soap {

    private $messages = array();
    private $soap;

    public function __construct() {
        try {
            $this -> connect();
        }
        catch (\Exception $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function connect() {
        try {
            $this->soap = new SoapClient(NULL, array(
                'location' => 'http://' . setting('soap.host_soap') . ':' . setting('soap.soap_port') . '/',
                'uri' => setting('soap.soap_uri'),
                'style' => setting('soap.soap_style'),
                'login' => setting('soap.soap_user'),
                'password' => setting('soap.soap_password')
            ));
        }
        catch (SoapFault $e) {
            $this->addMessage($e->getMessage());
        }
    }

    public function cmd($command) {
        $result = $this->soap->executeCommand(new SoapParam($command, 'command'));
        $this->addMessage($result);
    }

    public function addMessage($message) {
        $this->messages[] = $message;
    }

    public function getMessages() {
        return $this->messages;
    }

}
