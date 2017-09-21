<?php

class User {
	private static $filePath = $_SERVER['DOCUMENT_ROOT'] . "/users/";
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
        array_push($users, $this);
    }
    
    public function __construct($name,$dateJoined,$posts,$answers,$id) {
        $this->name = $name;
        $this->dateJoined = $dateJoined;
        $this->posts = $posts;
        $this->answers = $answers;
        $this->id = $id;
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
    
    public function save() {
    	$contents = array("name" => $name, 
    			"dateJoined" => $dateJoined,
    			"posts" => $posts, 
    			"answers" => $answers, 
    			"id" => $id);
    	$path = $filePath . $this->id . '.json';
    	file_put_contents($path, json_encode($contents));
    }
    
    public static function loadQuestion($path) {
    	$array = json_decode(file_get_contents($path));
    	$user = new User($array["name"],$array["dateJoined"],$array["posts"],$array["answers"],$array["id"]);
    	if(getAuthorById($user->id)!==null){
    		array_push($users, $user);
    	}
    }
    
    
}

?>