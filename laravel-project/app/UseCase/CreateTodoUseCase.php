<?php
namespace App\UseCase;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateTodoUseCase
{

    public function __invoke(Request $request)
    {
        Todo::validateTodo($request);
        $data = $request->merge(['user_id' => Auth::user()->id])->all();
        Todo::create($data);
    }

}
