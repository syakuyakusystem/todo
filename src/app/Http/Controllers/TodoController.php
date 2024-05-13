<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
  public function index()
  {
    $text_names = Todo::all();
    return view('index', compact('text_names'));
  }


  public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');
    }


  public function update(Request $request)
    {
        $todo = $request->all();
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }

  
  public function delete(Request $request)
    {
      $todo = Todo::find($request->id);
      $todo->delete();
      return redirect('/')->with('message', 'Todoを削除しました');
    }

  

}

