<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $rquest)
     {
       $user_id = Auth::id();
       $item = stock::where('user_id', $user_id)->get();
       $categories[] = category::where('id',1)
                          ->first();
       return view('category.index',['item' => $item, 'categories' => $categories]
        );

     }


    public function create(Request $request)
     {
       return view('category.create');
     }
    public function store(Request $request)
      {
        $this->validate($request,Stock::$rules);
        $stock = new Stock;
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/category');
      }


    public function edit(Request $request)
     {
       $food = array(
         'にんじん' => '1個',
       );
       return view('category.edit',['food' => $food]);
     }
    public function update(Request $request)
    {
      $param = [
        'volume' => $request->volume,
      ];
      DB::table('stocks')
            ->where('volume',$request->volume)
            ->update($param);
      return redirect('/category');
    }


    public function delete(Request $request)
       {
         $food = array(
           'こんにゃく' => '1個',
         );
         return view('category.delete',['food' => $food]);
       }
    public function destroy(Request $request)
      {
        DB::table('stocks')
              ->where('name',$request->name)
              ->delete();
        return redirect('/category');
      }

}
