<?php
namespace App\UseCase\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class GetCategory
{

    public function __invoke()
    {
        return Category::where('user_id', Auth::user()->id)->get();
    }
}
