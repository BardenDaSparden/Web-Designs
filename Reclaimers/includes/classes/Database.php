<?php

	class Database{

		private static $instance = null;

		public static function instance(){
			if(self::$instance == null){
				self::$instance = new Database();
			}

			return self::$instance;
		}

		private $PDO;
		private $error = false;
		private $results;
		private $count = 0;

		private function __construct(){
			try{

				$host = Config::get('config.mysql.host');
				$database = Config::get('config.mysql.database');
				$user = Config::get('config.mysql.username');
				$pass = Config::get('config.mysql.password');

				$this->PDO = new PDO("mysql:host=". $host .";dbname=". $database .";", $user, $pass);
				$this->PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $ex){
				echo 'Error has occured ', $ex->getMessage();
			}
		}

		public function query($sql, $params = array()){
			$this->error = false;
			if($statement = $this->PDO->prepare($sql)){
				$i = 1;
				if(count($params)){
					foreach($params as $param){
						$statement->bindValue($i, $param);
						$i += 1;
					}
				}

				if($statement->execute()){
					try{
						@$this->results = $statement->fetchAll(PDO::FETCH_OBJ);
						@$this->count = $statement->rowCount();
					} catch (Exception $ex){

					}
				}
			}

			return $this;

		}

		public function action($action, $table, $where = array()){
			if(count($where) == 3){
				$operators = array('=', '>', '<', '>=', '<=');

				$field = 	$where[0];
				$operator =	$where[1];
				$value = 	$where[2];

				if(in_array($operator, $operators)){
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

					if(!$this->query($sql, array($value))->getError()){
						return $this;
					}
				}
			}

			return false;

		}

		public function get($table, $where){
			return $this->action('SELECT *', $table, $where);
		}

		public function delete($table, $where){
			return $this->action('DELETE', $table, $where);
		}

		public function insert($table, $fields = array()){
			$keys = array_keys($fields);
			$values = '';
			$i = 1;

			foreach($fields as $field){
				$values .= '?';
				if($i < count($fields)){
					$values .= ', ';
				}
				$i += 1;
			}

			$sql = "INSERT INTO {$table} (`". implode('`, `', $keys) ."`) VALUES({$values})";

			if(!$this->query($sql, $fields)->getError()){
				return true;
			}

			return false;
		}

		public function update($table, $id, $fields){
			$set = '';
			$i = 1;

			foreach($fields as $name => $value){
				$set .= "{$name} = ?";
				if($i < count($fields)){
					$set.= ', ';
				}
				$i += 1;
			}

			$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
			if(!$this->query($sql, $fields)->getError()){
				return true;
			}

			return false;
		}

		public function first(){
			return $this->results[0];
		}

		public function getError(){
			return $this->error;
		}

		public function getResults(){
			return $this->results;
		}

		public function getCount(){
			return $this->count;
		}

	}

?>