<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function liste()
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
}