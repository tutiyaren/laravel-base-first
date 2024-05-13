<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\TodoCategory\Id;
use App\Domain\TodoCategory\TodoId;
use App\Domain\TodoCategory\CategoryId;

class Todo_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'todo_id'
    ];

    public function todo()
    {
        return $this->belongsTo(Todo::class, 'todo_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // id
    public function setIdAttribute($value)
    {
        $this->attributes['id'] = new Id($value);
    }
    public function getIdAttribute($value)
    {
        return $value instanceof Id ? $value->value() : $value;
    }
    // todo_id
    public function setTodoIdAttribute($value)
    {
        $this->attributes['todo_id'] = new TodoId($value);
    }
    public function getTodoIdAttribute($value)
    {
        return $value instanceof TodoId ? $value->value() : $value;
    }
    // category_id
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = new CategoryId($value);
    }
    public function getCategoryIdAttribute($value)
    {
        return $value instanceof CategoryId ? $value->value() : $value;
    }
}
