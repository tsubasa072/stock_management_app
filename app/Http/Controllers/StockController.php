<?php

namespace App\Http\Controllers;

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
      $user = Auth::user();
      $param = ['user' => $user];
      return view('hello.index',$param);
    }

  public function login(Request $request)
    {
      return view('hello.login');
    }
  public function getAuth(Request $request)
    {
      return view('hello.login');
    }
  public function postAuth(Request $request)
    {
      $email = $request->email;
      $password = $request->password;
      if (Auth::attempt(['email' => $email,
              'password' => $password])){
          $msg = 'ログイン完了';
        }else {
          $msg = ' ';
        }
        return view('hello.index',['message' => $msg]);
    }


  public function create(Request $request)
    {
      return view('hello.create');
    }

  public function store(Request $request)
    {
      $param = [
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
      ];

      DB::table('users')->insert($param);
      return redirect('/stock/index');
    }
}
