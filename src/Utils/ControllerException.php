<?php


namespace App\Utils;

use Exception;


class ControllerException extends Exception {

    public function __construct(int $code, string $message) {
        parent::__construct($message, $code);
    }
}