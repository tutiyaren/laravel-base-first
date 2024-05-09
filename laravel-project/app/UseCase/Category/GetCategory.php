<?php
namespace App\UseCase\Category;
use App\Models\Category;

class GetCategory
{

    public function __invoke()
    {
        return Category::get();
    }
}
