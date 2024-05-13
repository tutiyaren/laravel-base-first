<?php
namespace App\UseCase\Category;
use App\Models\Category;
use Illuminate\Http\Request;

class EditCategory
{
    public function __invoke(Request $request, $id)
    {
        $name = $request->input('name');
        $category = Category::find($id);
        $category->update([
            'name' => $name,
        ]);
    }
}
