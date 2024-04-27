<?php
namespace App\UseCase;
use App\Models\Todo;

class GetUserTodoUseCase
{
    public function __invoke()
    {
        return Todo::getMyAllOrderByDeadline();
    }
}
