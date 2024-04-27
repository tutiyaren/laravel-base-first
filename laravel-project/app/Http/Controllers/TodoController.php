<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCase\CreateTodoUseCase;
use App\UseCase\EditTodoUseCase;
use App\UseCase\DeleteTodoUseCase;
use App\UseCase\GetEditTodoUseCase;
use App\UseCase\GetShowTodoUseCase;
use App\UseCase\GetUserTodoUseCase;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetUserTodoUseCase $case)
    {
        $todos = $case();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CreateTodoUseCase $case)
    {
        $case($request);
        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetShowTodoUseCase $case)
    {
        $todo = $case($id);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, GetEditTodoUseCase $case)
    {
        $todo = $case($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, EditTodoUseCase $case)
    {
        $case($request, $id);
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteTodoUseCase $case)
    {
        $case($id);
        return redirect()->route('todo.index');
    }
}
