<?php
namespace App\UseCase\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CreateCategory
{

    public function __invoke(Request $request)
    {
        $userId = auth()->user()->id;
        $name = $request->input('name');
        Category::create([
            'user_id' => $userId,
            'name' => $name,
        ]);
    }
}
