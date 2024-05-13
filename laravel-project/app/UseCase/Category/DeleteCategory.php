<?php
namespace App\UseCase\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeleteCategory
{

    public function __invoke($id)
    {
        $category = Category::find($id);
        $category->delete();
    }
}
