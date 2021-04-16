<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use App\list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function index(Request $request)
    {
      $user_id = Auth::id();
      $buy_lists = List::where('user_id', $user_id)->get();

      return view('buy_list.index',['buy_lists' -> $buy_lists]);
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
        return view('/buy_list.create');
      }
    public function store(Request $request)
      {
        $this->validate($request, Stock::$rules);
        $stock = new Stock;
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/buy_list');
      }
}
