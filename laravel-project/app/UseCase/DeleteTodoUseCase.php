<?php
namespace App\UseCase;
use App\Models\Todo;

class DeleteTodoUseCase 
{
    public function __invoke($id)
    {
        $todo = Todo::find($id);
        $todo->todo_categories()->delete();
        $todo->delete();
    }
}