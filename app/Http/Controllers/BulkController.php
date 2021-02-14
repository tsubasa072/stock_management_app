<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BulkController extends Controller
{
    public function index(Request $request)
      {
        $item = DB::table('stocks')->get();
        return view('bulk.index',['item' => $item]);
      }

    public function create(Request $request)
      {
        return view('bulk.create');
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
        return redirect('/bulk');

      }

    public function edit(Request $request)
      {
        $food = array(
          '長ネギ' => '1個',
        );
        $kit = array(
          'スポンジ' => '1個',
        );
        return view('bulk.edit',['food' => $food],['kit' => $kit]);
      }
    public function update(Request $request)
      {
        $param = [
          'volume' => $request->volume,
        ];
        DB::table('stocks')
              ->where('volume',$request->volume)
              ->update($param);
        return redirect('/bulk');
      }


    public function delete(Request $request)
      {
        $food = array(
          '玉ねぎ' => '1個',
          '人参' => '2個',
        );
        $kit = array(
          '洗剤' => '1個',
        );
        return view('bulk.delete',['food' => $food],['kit' => $kit]);
      }
    public function destroy(Request $request)
      {

        DB::table('stocks')
              ->where('name',$request->name)
              ->delete('name');
        return redirect('/bulk');
      }
}
