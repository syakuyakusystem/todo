<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
  public function index()
  {
    $todos = Todo::with('category')->get();
    $categories = Category::all();
    return view('index', compact('todos','categories'));
  }

  public function search(Request $request)
    {
      $todo = Todo::with('category_id')->CategorySearch($request->category_id)->Keywordsearch($request->keyword)->get();

      $categories = Category::all();

      return view('index', compact('todos', 'categories'));
    }


  public function store(Request $request)
    {
      $todo = $request->only(['category_id', 'content']);
  
      Todo::create($todo);

      return redirect('/')->with('message', 'Todoを作成しました');
    }


  public function update(Request $request)
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

