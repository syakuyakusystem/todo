<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;


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

      return redirect('/')->with('message','Todoを作成しました');
  }

  public function edit($id)
  {
    $todo = Todo::find($id);
    return view('index', compact('text_names'));
  }


  public function update(TodoRequest $request)
  {
  
    $todo = $request->only(['content']);
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

