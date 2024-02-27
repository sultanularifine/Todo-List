<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todo.index', ['data' => $todos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'time' => 'required',
            'date' => 'required',
        ]);

        $todo = new Todo();
        $todo->name = $request->name;
        $todo->time = $request->time;
        $todo->date = $request->date;
        $todo->save();

        return redirect()->back();
    }

    public function edit($id)
    {

        $todo = Todo::find($id);
       
        return view('todo.edit', ['data' => $todo]);
    }
    public function update(Request $request, $id)
    {

        $todo = Todo::find($id);
        $todo->name = $request->name;
        $todo->time = $request->time;
        $todo->date = $request->date;
        $todo->save();

        return redirect()->route('todo.list');

    } 
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if($todo->delete()){
            return redirect()->back();
        }
        
        
       
    }
}
