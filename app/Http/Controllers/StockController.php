<?php

namespace App\Http\Controllers;

use App\category;
use App\stock;
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
      $item = category::all();
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

  public function register(Request $request)
    {
      return view('hello.register');
    }

  public function store(Request $request)
    {
      $param = [
        'name' => $request->name,

      ];

      DB::table('users')->insert($param);
      return redirect('/stock/index');
    }
}
