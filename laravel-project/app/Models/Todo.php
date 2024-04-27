<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class Todo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

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
