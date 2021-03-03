<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index(Request $request)
    {
      $item = user::where('name', $request->input)->first();
      $param = ['input' => $request->input, 'item' => $item];
      return view('user.index',$param);
    }

    public function store(Request $request)
    {
      $user = array(
        '鈴木伸之' => 'ヤマト',
      );
      $use = array(
        '山下健二郎' => 'ダン',
      );
      return view('user.store',['user' => $user],['use' => $use]);
    }

    public function destroy(Request $request)
    {
      $item = user::where('name', $request->input)->first();
      $param = ['input' => $request->input, 'item' => $item];

      $use = user::all();

      return view('user.destroy',$param,['use' => $use]);
    }
}
