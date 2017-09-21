<?php
    class Question {
        private static $questions = [];
        private $author;
        private $title;
        private $question;
        private $answer;
        private $choices;
        private $source;
        private $datePosted;
        private $id;
        
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
        
        public function getTitle() {
            return $title;
        }
        
        public function getQuestion() {
            return $question;
        }
        
        public function getAnswer() {
            return $answer;
        }
        
        public function getChoices() {
            return $choices;
        }
        
        public function getSource() {
            return $source;
        }
        
        public function getId() {
            return $id;    
        }
        
        public function getDatePosted() {
            return $datePosted;
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