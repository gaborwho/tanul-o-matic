<?php

namespace AppBundle\Entity;

class Card
{

    public $question;
    public $answer;

    public function __construct($question, $answer) {
        $this->question = $question;
        $this->answer = $answer;
    }

    public static function getAll() {
        return array(
            1 => new Card('First Question?', 'First Answer.'),
            2 => new Card('Second Question?', 'Second Answer.')
        );
    }

}

