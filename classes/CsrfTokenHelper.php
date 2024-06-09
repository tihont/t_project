<?php

class CsrfTokenHelper
{
    private bool $sessionStarted = false;
    private $token = null;

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            $this->sessionStarted = true;
        }
    }

    public function setToken() {
        $this->token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $this->token;
    }

    public function getToken() {
        return $this->token;
    }

    public function validateToken($token): bool
    {
        if (isset($_SESSION['csrf_token']) && $token == $_SESSION['csrf_token']) {
            return true;
        }
        return false;
    }

    public function deleteToken() {
        if ($this->sessionStarted) {
            unset($_SESSION['csrf_token']);
            $this->token = null;
        }
    }
}