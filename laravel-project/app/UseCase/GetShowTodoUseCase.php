<?php
namespace App\UseCase;
use App\Models\Todo;

class GetShowTodoUseCase
{
    public function __invoke($id)
    {
        return Todo::find($id);
    }
}
