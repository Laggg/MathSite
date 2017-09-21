<?php
class Answer {
    private $questionId;
    private $answer;
    private $time;
    private $correct;
    
    function __construct($questionId,$answer) {
        $this->questionId = $questionId;
        $this->answer = $answer;
        $this->time = time();
    }
    
    function setCorrect($bool) {
        $this->correct = $bool;
    }
    
    function getCorrect() {
    	return $correct;
    }
    
    function getTime() {
    	return $time;
    }
    
    function getAnswer() {
        return $answer;
    }
    
    function getQuestionId() {
        return $questionId;
    }
}
?>