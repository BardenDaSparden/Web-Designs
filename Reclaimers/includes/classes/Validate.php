<?php

class Validate{
	
	private $passed = false;
	private $errors = array();
	private $database = null;

	public function __construct(){
		$this->database = Database::instance();
	}

	public function check($source, $items = array()){
		foreach($items as $field => $rules){
			foreach($rules as $rule => $rule_value){
				
				$value = trim($source[$field]);

				if($rule === 'required' && empty($value)){
					$this->addError("{$field} is required");
				} else if(!empty($value)){
					switch($rule){
						case 'min':
							if(strlen($value) < $rule_value){
								$this->addError("{$field} must be a minimum of length of {$rule_value} characters.");
							}
						break;

						case 'max':
							if(strlen($value) > $rule_value){
								$this->addError("{$field} must be a maximum of length of {$rule_value} characters.");
							}
						break;

						case 'matches':
							if($value != $source[$rule_value]){
								$this->addError("{$field} must match {$rule_value}.");
							}
						break;

						case 'unique':
							$check = $this->database->get($rule_value, array($field, '=', $value));
							if($check->getCount()){
								$this->addError("{$field} already exists.");
							}
						break;
					}
				}
			}
		}

		if(empty($this->errors)){
			$this->passed = true;
		}

		return $this;

	}

	private function addError($error){
		$this->errors[] = $error;
	}

	public function getErrors(){
		return $this->errors;
	}

	public function passed(){
		return $this->passed;
	}

}

?>