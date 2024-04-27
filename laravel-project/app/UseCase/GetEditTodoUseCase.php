<?php
namespace App\UseCase;
use App\Models\Todo;

class GetEditTodoUseCase
{
    public function __invoke($id)
    {
        return Todo::find($id);
    }
}