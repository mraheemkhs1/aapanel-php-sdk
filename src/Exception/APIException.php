<?php
namespace AaPanelSDK\Exception;

class APIException extends \Exception {
    private $response;

    public function __construct($message = "", $code = 0, $response = null) {
        parent::__construct($message, $code);
        $this->response = $response;
    }

    public function getResponse() {
        return $this->response;
    }
}
