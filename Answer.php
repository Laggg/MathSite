<?php
class Answer {
    private $questionId;
    private $answer;
    private $time;
    
    function __construct($questionId,$answer) {
        $this->questionId = $questionId;
        $this->answer = $answer;
        $this->time = time();
    }
    
    function getAnswer() {
        return $answer;
    }
    
    function getQuestionId() {
        return $questionId;
    }
}
?>