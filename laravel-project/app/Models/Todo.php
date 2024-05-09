<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Domain\Todo\Id;
use App\Domain\Todo\UserId;
use App\Domain\Todo\TodoTitle;
use App\Domain\Todo\Deadline;
use App\Domain\Todo\Comment;
use App\Domain\Todo\Status;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function todo_categories()
    {
        return $this->hasMany(Todo_category::class, 'todo_id');
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
    // userId
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = new UserId($value);
    }
    public function getUserIdAttribute($value)
    {
        return $value instanceof UserId ? $value->value() : $value;
    }
    // todoTitle
    public function setTitleAttribute($value)
    {
        $this->attributes['todo'] = new TodoTitle($value);
    }
    public function getTitleAttribute($value)
    {
        return $value instanceof TodoTitle ? $value->value() : $value;
    }
    // deadline
    public function setDeadlineAttribute($value)
    {
        $this->attributes['deadline'] = new Deadline($value);
    }
    public function getDeadlineAttribute($value)
    {
        return $value instanceof Deadline ? $value->value() : $value;
    }
    // comment
    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = new Comment($value);
    }
    public function getCommentAttribute($value)
    {
        return $value instanceof Comment ? $value->value() : $value;
    }
    // status
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = new Status($value);
    }
    public function getStatusAttribute($value)
    {
        return $value instanceof Status ? $value->value() : $value;
    }

    
    public static function getAllOrderByDeadline()
    {
        return self::OrderBy('deadline', 'asc')->get();
    }

    public static function getMyAllOrderByDeadline()
    {
        $todos = self::where('user_id', Auth::user()->id)
        ->orderBy('deadline', 'asc')
        ->get();
        return $todos;
    }

    public static function validateTodo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'todo' => 'required|max:191',
            'deadline' => 'required'
        ]);
        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }
    }
}
