<?php

namespace App\Http\Controllers;

use App\Category;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
  public function top(Request $request)
    {
     return view('hello.top');
   }

  public function index(Request $request)
     {
      $user_id = Auth::id();
      $item = category::where('user_id',4)->get();
      $user = Auth::user();
      $param = ['user' => $user];


      return view('hello.index',$param,['item' => $item]);

    }

  public function login(Request $request)
    {
      return view('hello.login');
    }

  public function postAuth(Request $request)
    {
      $email = $request->email;
      $password = $request->password;

      Auth::attempt(['email' => $email,
              'password' => $password]);
        return redirect('/stock/index');

    }

  public function create(Request $request)
    {

      return view('hello.create');
    }


  public function store(Request $request)
    {
      $this->validate($request, category::$rules);
      $category = new category;
      $form = $request->all();
      unset($form['_token']);
      $category->fill($form)->save();

      return redirect('/stock/index');
    }

  public function delete(Request $request)
    {
      return view('hello.delete');
    }
}
