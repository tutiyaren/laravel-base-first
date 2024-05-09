<?php
namespace App\UseCase\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GetEditCategory
{

    public function __invoke($id)
    {
        return Category::find($id);
    }
}
