<?php
namespace App\UseCase;
use App\Models\Category;
use Illuminate\Http\Request;

class GetCreateTodo
{

    public function __invoke()
    {
        return Category::where('user_id', auth()->user()->id)->get();
    }
}
