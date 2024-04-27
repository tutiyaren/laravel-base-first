<?php
namespace App\UseCase;
use App\Models\Todo;

class DeleteTodoUseCase 
{
    public function __invoke($id)
    {
        Todo::find($id)->delete();
    }
}