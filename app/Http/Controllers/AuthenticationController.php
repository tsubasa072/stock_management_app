<?php

namespace App\Http\Controllers;

use App\user;
use App\Follow_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      $user_id = Auth::id();
      $item = Follow_request::where('request_user_id',$user_id)
              ->get();
              // dd($item);
      foreach ($item as $value){
        $users[] = user::where('id',$value->user_id)->first();
      }
    // dd($users);
      return view('user.store',['item' => $item, 'users' => $users]);
    }

    public function destroy(Request $request)
    {
      $item = user::where('name', $request->input)->first();
      $param = ['input' => $request->input, 'item' => $item];

      $use = user::all();

      return view('user.destroy',$param,['use' => $use]);
    }
}
