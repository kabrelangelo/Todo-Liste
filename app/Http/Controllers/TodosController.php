<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        return view("home", ["todos" => Todos::all()]);
    }


    public function saveTodo(Request $request)
    {
        $todo = new Todos;
        $todo->texte = $request->texte;
        $todo->fin = 0; // Fournir une valeur pour le champ fin
        $todo->save();
        return redirect()->back();
    }
    public function markAsDone($id)
    {
        $todo = Todos::find($id);
        if ($todo) {
            $todo->fin = !$todo->fin;
            $todo->save();
        }
        return redirect("/");
    }
    public function deleteTodo($id)
    {
        $todo  = Todos::find($id);
        if ($todo) {
            $todo->delete();
        }

        return redirect("/");
    }

    public function showCompleted()
    {
        $todos = Todos::where('termine', true)->get();
        return view('todo.completed', compact('todos'));
    }
    // public function index()
    // {
    //     $todo = Todos::all();
    //     return view('todo.index', ['todo' => $todo]);
    // }
}