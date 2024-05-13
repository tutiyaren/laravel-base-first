<?php
namespace App\UseCase;
use App\Models\Todo;
use App\Models\Todo_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateTodoUseCase
{

    public function __invoke(Request $request)
    {
        Todo::validateTodo($request);
        $category_id = $request->input('name');
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        $todo = Todo::create($data);
        $todo_id = $todo->id;
        Todo_category::create([
            'todo_id' => $todo_id,
            'category_id' => $category_id
        ]);
    }

}
