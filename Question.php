<?php
    class Question {
        private static $filePath = $_SERVER['DOCUMENT_ROOT'] . "/questions/";
        private static $questions = [];
        private $author;
        private $title;
        private $question;
        private $answer;
        private $choices;
        private $source;
        private $datePosted;
        private $id;
        private $answers = [];
        
        private function __construct($author,$title,$question,$answer,$choices,$source,$datePosted,$id,$answers) {
            $this->author = $author;
            $this->title = $title;
            $this->question = $question;
            $this->answer = $answer;
            $this->choices = $choices;
            $this->source = $source;
            $this->datePosted = $datePosted;
            $this->id = $id;
            $this->answers = $answers;
        }
        
        public function __construct($author,$title,$question,$answer,$choices,$source) {
            $datePosted = time();
            $this->author = $author;
            $this->title = $title;
            $this->question = $question;
            $this->answer = $answer;
            $this->choices = $choices;
            $this->source = $source;
            $id = uniqid();
            array_push($questions, $this);
        }
        
        public function getAuthor() {
            return $author;
        }
        
        public function setAuthor($author) {
            $this->author = $author;
        }
        
        public function getTitle() {
            return $title;
        }
        
        public function setTitle($title) {
            $this->title = $title;
        }
        
        public function getQuestion() {
            return $question;
        }
        
        public function setQuestion($question) {
            $this->question = $question;
        }
        
        public function getAnswer() {
            return $answer;
        }
        
        public function setAnswer($answer) {
            $this->answer = $answer;
        }
        
        public function getChoices() {
            return $choices;
        }
        
        public function setChoices($choices) {
            $this->choices = $choices;
        }
        
        public function getSource() {
            return $source;
        }
        
        public function setSource($source) {
            $this->source = $source;
        }
        
        public function getId() {
            return $id;    
        }
        
        public function getDatePosted() {
            return $datePosted;
        }
        
        public function save() {
            $contents = array("author" => $author, "title" => $title, 
                "question" => $question, "answer" => $answer, "choices" => $choices, 
                "source" => $source, "datePosted" => $datePosted, 
                "id" => $id, "answers" => $answers);
            $path = $filePath . $this->id . '.json';
            file_put_contents($path, json_encode($contents));
        }
        
        public static function loadQuestion($path) {
            $array = json_decode(file_get_contents($path));
            $question = new Question($array["author"],$array["title"],$array["question"],
                $array["answer"],$array["choices"],$array["source"],$array["datePosted"],
                $array["id"],$array["answers"]);
            if(getQuestionById($question->id)===null) {
                array_push($questions, $question);
            }
        }
        
        public function sendAnswer($answer) {
            $answer->setCorrect(getAnswer()===$answer);
            array_push($answers, $answer);
            return getAnswer()===$answer;
        }
        
        public static function getQuestionById($id) {
            foreach($questions as $question) {
                if($question->getId()===$id) {
                    return $question;
                }
            }
            return null;
        }
        
        public static function getQuestionsByAuthor($author) {
            $array = [];
            foreach($questions as $question) {
                if($question->getAuthor()===$author) {
                    array_push($array, $question);
                }
            }
            return $array;
        }
        
        public static function getQuestionsByDate($startDate,$endDate) {
            $array = [];
            foreach($questions as $question) {
                if($question->getDatePosted()<$endDate && $question->getDatePosted()>$startDate) {
                    array_push($array, $question);
                }
            }
            return $array;
        }

        public static function getQuestionsByTitle($search) {
            $array = [];
            foreach($questions as $question) {
                if(strpos($this->getTitle(), $search)!==false) {
                    array_push($array, $question);
                }
            }
            return $array;
        }
        
    }

?>