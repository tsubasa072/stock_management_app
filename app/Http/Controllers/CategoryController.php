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
       // dd($request);
       $user_id = Auth::id();
       $categories = Category::where('user_id',$user_id)->get();
       // dd($categories);
       foreach($categories as $category){
       $stocks = Stock::where('category_id',$category->id)->first();
     }
     // dd($stocks);
       return view('category.index',['stocks' => $stocks, 'categories' => $categories]
        );

     }


    public function create(Request $request)
     {
       unset($request['_token']);
       // dd($request);
       foreach($request->category_id as $key => $value){
         // dd($request->category_id);
         $category = Category::where('id',$key)->first();
         // dd($category);
       }
       return view('category.create',['category' => $category]);
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
