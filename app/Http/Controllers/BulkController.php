<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BulkController extends Controller
{
    public function index(Request $request)
      {
        $user_id = Auth::id();
        $item = stock::where('user_id',4)->get();
        //dd($item);
        foreach($item as $value){
          $categories[] = category::where('id', $value->category_id)
                          ->first();
        }

        return view('bulk.index',['item' => $item, 'categories' => $categories]);
      }

    public function create(Request $request)
      {
        return view('bulk.create');
      }
    public function store(Request $request)
      {
        $this->validate($request, Stock::$rules);
        $stock = new Stock;
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();

        return redirect('/bulk');

      }

    public function edit(Request $request)
      {
        $item = stock::all();
        // dd($item);
        return view('bulk.edit',['item' => $item]);
      }
    public function update(Request $request)
      {
        $this->validate($request, Stock::$rules);
        $stock = Stock::where('name');
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/bulk');
      }


    public function delete(Request $request)
      {
        return view('bulk.delete');
      }
    public function destroy(Request $request)
      {

        DB::table('stocks')
              ->where('name',$request->name)
              ->delete('name');
        return redirect('/bulk');
      }
}
