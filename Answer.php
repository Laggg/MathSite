<?php
class Answer {
    private $questionId;
    private $answer;
    
    function __construct($questionId,$answer) {
        $this->questionId = $questionId;
        $this->answer = $answer;
    }
    
    function getAnswer() {
        return $answer;
    }
    
    function getQuestionId() {
        return $questionId;
    }
}
?>