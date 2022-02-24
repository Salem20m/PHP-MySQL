<?php

// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

class DB
{
	private $host = 'localhost';
	private $db   = 'job_indicator';
	private $user = 'root';
	private $pass = '';
	private $charset = 'utf8';

	private $pdo;

	public function connect()
	{
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

		try {
			$this->pdo = new PDO($dsn, $this->user, $this->pass);
		} catch (PDOException $e) {
			throw $e;
		}
	}

	public function insert($table, $columns, array $data)
	{
		try {
			$numberOfColumns = explode(",", $columns);
			$values = str_repeat('?,', count($numberOfColumns) - 1) . '?'; // Create placeholder for each column (i.e. ?, ?)			
			$this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($values)")->execute($data);
		} catch (PDOException $e) {
			throw $e;
		}
	}

	public function update($table, $columns, $where, array $data)
	{
		try {
			$this->pdo->prepare("UPDATE $table SET $columns WHERE $where")->execute($data);
		} catch (PDOException $e) {
			throw $e;
		}
	}

	public function delete($table, $where, $data)
	{
		try {
			$this->pdo->prepare("DELETE FROM $table WHERE $where")->execute([$data]);
		} catch (PDOException $e) {
			throw $e;
		}
	}

	public function find($table, $columns = "*", $where = 1, array $data = null)
	{
		try {
			$query = "SELECT $columns FROM $table WHERE $where";

			if ($data) {
				$stmt = $this->pdo->prepare($query);
				$stmt->execute($data);
			} else {
				$stmt = $this->pdo->query($query);
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $stmt->fetch();
	}
	
	public function findColumn($table, $column, $where = 1, array $data = null)
	{
		try {
			$query = "SELECT $column FROM $table WHERE $where";
			
			if ($data) {
				$stmt = $this->pdo->prepare($query);
				$stmt->execute($data);
			} else {
				$stmt = $this->pdo->query($query);
			}
		} catch (PDOException $e) {
			throw $e;
		}
		
		return $stmt->fetchColumn();
	}

	public function findAll($table, $columns = "*", $where = 1, array $data = null)
	{
		try {
			$query = "SELECT $columns FROM $table WHERE $where";

			if ($data) {
				$stmt = $this->pdo->prepare($query);
				$stmt->execute($data);
			} else {
				$stmt = $this->pdo->query($query);
			}
		} catch (PDOException $e) {
			throw $e;
		}

		return $stmt->fetchAll();
	}

	public function getApplicants($job_id)
	{
		$table = "applicant";
		$columns = "id,name,email,phone_number";
		$where = "job_id = ?";

		$applicants = $this->findAll($table, $columns, $where, [$job_id]);

		$applicant = [];
		foreach ($applicants as $c) {
			$applicantCompetence = $this->findAll("applicant_competence", "competence_id,level_id", "applicant_id = ?", [$c['id']]);
			array_push($applicant, ["name" => $c['name'], 'email' => $c['email'], "phone" => $c['phone_number']]);

			$last = array_key_last($applicant);

			$competencesLevels = [];
			$referralValue = 0;
			foreach ($applicantCompetence as $cc) {
				$competence = $this->find("competences", "competence, height", "id = ?", [$cc['competence_id']]);
				$level = $this->find("levels", "level, factor", "id = ?", [$cc['level_id']]);

				$referralValue += $competence['height'] * $level['factor'];
				$competencesLevels[] = array_merge($competence, $level);
			}

			$applicant[$last]["referral_value"] = $referralValue;
			$applicant[$last]["competences_levels"] = $competencesLevels;
		}

		//sorted in descending order by referral value
		usort($applicant, function ($applicant1, $applicant2) {
			return $applicant2['referral_value'] <=> $applicant1['referral_value'];
		});

		return $applicant;
	}
}


$DB = new DB;
$DB->connect();
