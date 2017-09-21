<?php
	function loadQuestions($folderPath) {
		$array = scandir($folderPath);
		foreach($array as $file) {
			Question::loadQuestion($file);
		}
	}
	
	function loadUsers($folderPath) {
		$array = scandir($folderPath);
		foreach($array as $file) {
			User::loadUser($file);
		}
	}
	
?>