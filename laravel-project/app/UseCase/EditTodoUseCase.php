<?php
namespace App\UseCase;
use App\Models\Todo;
use App\Models\Todo_category;
use Illuminate\Http\Request;

class EditTodoUseCase
{
    public function __invoke(Request $request, $id)
    {
        $data = $request->all();
        $category_id = $request->input('name');
        $todo = Todo::find($id);
        $todo->update($data);
        $todoCategory = Todo_category::where('todo_id', $id)->first();
        if($todoCategory) {
            $todoCategory->update(['category_id' => $category_id]);
            return;
        }
        Todo_category::create([
            'category_id' => $category_id,
            'todo_id' => $id,
        ]);
    }
}
