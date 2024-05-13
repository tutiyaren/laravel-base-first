<?php
namespace App\Domain\Todo;
require_once __DIR__ . '/../../../vendor/autoload.php';

use App\Domain\Todo\Id;
use App\Domain\Todo\UserId;
use App\Domain\Todo\TodoTitle;
use App\Domain\Todo\Deadline;
use App\Domain\Todo\Comment;

final class NewBlog
{
    private $id;
    private $user_id;
    private $todo;
    private $deadline;
    private $comment;

    public function __construct(Id $id, UserId $user_id, TodoTitle $todo, Deadline $deadline, Comment $comment)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->todo = $todo;
        $this->deadline = $deadline;
        $this->comment = $comment;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function user_id(): UserId
    {
        return $this->user_id;
    }

    public function todo(): TodoTitle
    {
        return $this->todo;
    }

    public function deadline(): Deadline
    {
        return $this->deadline;
    }

    public function comment(): Comment
    {
        return $this->comment;
    }
}
