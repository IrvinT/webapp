<?php

namespace app;

class Db {

	private $bdd;

	private $host = 'localhost';

	private $dbname = 'webapp';

	private $user = 'root';

	private $password = 'root';

	public function __construct() {
		try
		{
			$this->bdd = new \PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
		}
		catch (Exception $e)
		{
		        die('Erreur : ' . $e->getMessage());
		}
	}

	public function isUserExist($pseudo){
		$request = $this->bdd->query("SELECT * FROM users WHERE pseudo = '" . $pseudo . "'");
		return $request->fetch(\PDO::FETCH_OBJ);
	}

	public function isTaskExist($id){
		$request = $this->bdd->query("SELECT * FROM tasks WHERE id = '" . $id . "'");
		return $request->fetch(\PDO::FETCH_OBJ);
	}

	public function addUser($pseudo){
		$this->bdd->exec('INSERT INTO users(pseudo, date_add) VALUES('. $this->bdd->quote($pseudo) .', NOW())');
	}

	public function addTask($pseudo, $task){

		$user = $this->isUserExist($pseudo);

		if($user){
			$this->bdd->exec('INSERT INTO tasks(id_user, task, date_add) VALUES('. $user->id .', '. $this->bdd->quote($task).', NOW())');
			return $this->bdd->lastInsertId();
		}
	}

	public function removeTask($id)
	{
		$task = $this->isTaskExist($id);

		if($task){
			$this->bdd->exec('DELETE FROM tasks WHERE id = ' . $task->id);
		}
	}

	public function getTasks($pseudo){

		$user = $this->isUserExist($pseudo);

		if($user){
			$request = $this->bdd->query("SELECT * FROM tasks WHERE id_user = '" . $user->id . "'");
			return $request->fetchAll(\PDO::FETCH_OBJ);
		}
	}
}