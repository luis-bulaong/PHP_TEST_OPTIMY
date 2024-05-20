<?php
namespace PHPTest\utils;

class DB
{
	private $pdo;

	public function __construct()
	{
		$dsn = "mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}";
		$user = $_ENV['DB_USER'];
		$password = $_ENV['DB_PASS'];

		$this->pdo = new \PDO($dsn, $user, $password);
	}

	public function select($sql)
	{
		$sth = $this->pdo->query($sql);

		return $sth->fetchAll();
	}

	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}