<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class CategoryController extends Controller
{
    public function index(Request $rquest)
     {
       $item = DB::table('stocks')->first();

       return view('category.index',['item' => $item]
        );

     }


    public function create(Request $request)
     {
       return view('category.create');
     }
    public function store(Request $request)
      {
        $param = [
          'category_id' => $request->category_id,
          'name' => $request->name,
          'volume' => $request->volume,
          'user_id' => $request->user_id,
        ];
        $user = Auth::user();
        DB::table('stocks')->insert($param);
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
