<?php
namespace PHPTest\utils;

use PHPTest\utils\DB;
use PHPTest\classes\Comment;

class CommentManager
{
	private $db = null;

	private static $tableName = 'comment';

	public function __construct()
	{
		$this->db = new DB();
	}

	public function listComments()
	{
		$rows = $this->db->select("SELECT * FROM `". self::$tableName ."`");
		$comments = [];

		foreach($rows as $row) {
			$n = new Comment();
			$comments[] = $n->setId($row['id'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at'])
			  ->setNewsId($row['news_id']);
		}

		return $comments;
	}

	public function addCommentForNews($body, $newsId)
	{
		$sql = "INSERT INTO `". self::$tableName ."` (`body`, `created_at`, `news_id`) VALUES('". $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
		$this->db->exec($sql);

		return $this->db->lastInsertId($sql);
	}

	public function deleteComment($id)
	{
		$sql = "DELETE FROM `". self::$tableName ."` WHERE `id`=" . $id;

		return $this->db->exec($sql);
	}
}