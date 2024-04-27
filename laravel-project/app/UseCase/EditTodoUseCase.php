<?php
namespace App\UseCase;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EditTodoUseCase
{

    public function __invoke(Request $request, $id)
    {
        Todo::validateTodo($request);
        Todo::find($id)->update($request->all());
    }
}
