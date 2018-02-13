<?php

namespace App\User\Generator;

class MessageGenerator
{

    protected $messages;

    public function __construct(array $messages) {
        $this->messages = $messages;
    }

    public function getRandomMessage()
    {
        $index = array_rand($this->messages);
        return $this->messages[$index];
    }
}