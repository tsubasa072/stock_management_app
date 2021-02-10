<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
  public function top(Request $request)
    {
     return view('hello.top');
   }

  public function index(Request $request)
     {
      return view('hello.index');
    }

  public function auth(Request $request)
    {
      return view('hello.auth');
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
