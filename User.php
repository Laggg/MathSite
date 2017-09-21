<?php

class User {
    private static $users = [];
    private $name;
    private $dateJoined;
    private $posts;
    private $answers;
    private $id;
    
    public function __construct($name) {
        $this->name = $name;
        $this->dateJoined = time();
        $this->posts = [];
        $this->answers = [];
    }
    
    public function __construct($name,$dateJoined,$posts,$answers) {
        $this->name = $name;
        $this->dateJoined = $dateJoined;
        $this->posts = $posts;
        $this->answers = $answers;
    }
    
    public function postQuestion($question,$answer,$title,$choices,$source) {
        $myQuestion = new Question($this->id,$title,$question,$answer,$choices,$source);
        $myQuestion->save();
    }
    
    public function sendAnswer($question,$answerText) {
        $answer = new Answer($question->getId(),$answerText);
        $result = $question->sendAnswer($answer);
        array_push($answers, $answer);
        return $result;
    }
    
    public static function getAuthorById($id) {
        foreach($users as $user) {
            if($id===$user->id) {
                return $user;
            }
        }
        return null;
    }
    
}

?>