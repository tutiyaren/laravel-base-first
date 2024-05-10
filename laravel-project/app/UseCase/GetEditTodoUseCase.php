<?php
namespace App\UseCase;
use App\Models\Todo;
use App\Models\Category;

class GetEditTodoUseCase
{
    public function __invoke($id)
    {
        $todo = Todo::find($id);
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return [$todo, $categories];
    }
}