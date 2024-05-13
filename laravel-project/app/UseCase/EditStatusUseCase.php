<?php
namespace App\UseCase;
use App\Models\Todo;

class EditStatusUseCase
{
    public function __invoke($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->status = 1 - $todo->status;
        $todo->save();
    }
}