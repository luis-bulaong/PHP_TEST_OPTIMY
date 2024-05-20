<?php
namespace PHPTest\utils;

use PHPTest\utils\DB;
use PHPTest\utils\CommentManager;
use PHPTest\classes\News;

class NewsManager
{
	private $db = null;

	private static $tableName = 'news';

	/**
	 * Initialize class
	 */
	public function __construct()
	{
		$this->db = new DB();
	}

	/**
	* list all news
	*/
	public function listNews()
	{
		$rows = $this->db->select("SELECT * FROM `". self::$tableName ."`");
		$news = [];

		foreach($rows as $row) {
			$newsObject = new News();

			$news[] = $newsObject->setId($row['id'])
			  ->setTitle($row['title'])
			  ->setBody($row['body'])
			  ->setCreatedAt($row['created_at']);
		}

		return $news;
	}

	/**
	* add a record in news table
	*/
	public function addNews($title, $body)
	{
		$sql = "INSERT INTO `". self::$tableName ."` (`title`, `body`, `created_at`) VALUES('". $title . "','" . $body . "','" . date('Y-m-d') . "')";
		$this->db->exec($sql);

		return $this->db->lastInsertId($sql);
	}

	/**
	* deletes a news, and also linked comments
	*/
	public function deleteNews($id)
	{
		$commentManager = new CommentManager();
		$comments = $commentManager->listComments();
		$idsToDelete = [];

		foreach ($comments as $comment) {
			if ($comment->getNewsId() == $id) {
				$idsToDelete[] = $comment->getId();
			}
		}

		foreach($idsToDelete as $id) {
			$commentManager->deleteComment($id);
		}

		$sql = "DELETE FROM `". self::$tableName ."` WHERE `id`=" . $id;

		return $this->db->exec($sql);
	}
}