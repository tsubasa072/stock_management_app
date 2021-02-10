<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function index(Request $request)
    {
      $user = array(
        '山田裕貴' => '村山',
      );
      return view('user.index',['user' => $user]);
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
      $user = array(
        '岩田剛典' => 'コブラ',
      );
      $use = array(
        '町田啓太' => 'ノボル',
      );
      return view('user.destroy',['user' => $user],['use' => $use]);
    }
}
