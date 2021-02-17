<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function index(Request $request)
    {
      $item = DB::table('stocks')->get();
      return view('buy_list.index',['item' => $item]);
    }


    public function edit(Request $request)
      {
        $a = array(
          'たまご' => '１個',
        );
        $b = array(
          '洗剤' => '1個',
        );
        return view('buy_list.edit',['a' => $a],['b' => $b]);
      }
    public function update(Request $request)
      {
        $param = [
          'volume' => $request->volume,
        ];
        DB::table('stocks')
              ->where('volume',$request->volume)
              ->update($param);
        return redirect('/buy_list');
      }


    public function delete(Request $request)
      {
        $a = array(
          'みかん' => '１個',
        );
        $b = array(
          'まな板' => '1個',
        );
        return view('buy_list.delete',['a' => $a],['b' => $b]);
      }
    public function destroy(Request $request)
      {
        DB::table('stocks')
              ->where('name',$request->name)
              ->delete();

        return redirect('/buy_list');
      }


    public function create(Request $request)
      {
        return view('buy_list.create');
      }
    public function store(Request $request)
      {
        $param = [
          'category_id' => $request->category_id,
          'name' => $request->name,
          'volume' => $request->volume,
          'user_id' => $request->user_id,
        ];

        DB::table('stocks')->insert($param);
        return redirect('/buy_list');
      }
}
