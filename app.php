<?php

use PHPTest\utils\NewsManager;
use PHPTest\utils\CommentManager;

$commentManager = new CommentManager();
foreach ((new NewsManager())->listNews() as $news) {
	echo("############ NEWS " . $news->getTitle() . " ############\n");
	echo($news->getBody() . "\n");

	foreach ((new CommentManager())->listComments() as $comment) {
		if ($comment->getNewsId() == $news->getId()) {
			echo("Comment " . $comment->getId() . " : " . $comment->getBody() . "\n");
		}
	}
}

$commentManager->listComments();