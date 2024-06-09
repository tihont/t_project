<?php

class MessageHelper
{
    private string $message_title = '';
    private string $message_text = '';

    public function __construct($message_title, $error_message)
    {
        $this->message_title = $message_title;
        $this->message_text = $error_message;
    }

    public function setMessageText($message_text)
    {
        $this->message_text = $message_text;
    }

    public function setMessageTitle($message_title)
    {
        $this->message_title = $message_title;
    }

    public function getMessageText(): string
    {
        return $this->message_text;
    }

    public function getMessageTitle(): string
    {
        return $this->message_title;
    }
}