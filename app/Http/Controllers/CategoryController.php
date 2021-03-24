<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
  //カテゴリートップページ
    public function index(Request $rquest)
     {
       $user_id = Auth::id();
       $categories = Category::where('user_id',$user_id)->get();
       foreach($categories as $category){
       $stocks[] = Stock::where('category_id',$category->id)->get();
       $param = category::where('id', $category->id)->first();
     }
       return view('category.index',['stocks' => $stocks, 'categories' => $categories
                ,'param' => $param]);
     }


  //登録処理
    public function create(Request $request)
     {
       unset($request['_token']);
       foreach($request->id as $key => $value){
         $category = Category::where('id',$key)->first();
       }
       return view('category.create',['category' => $category]);
     }
    public function store(Request $request)
      {
        unset($request['_token']);
        $this->validate($request,Stock::$rules);
        $stock = new Stock;
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/category');
      }


  //更新処理
    public function edit(Request $request)
     {
       unset($request['_token']);
       $user_id = Auth::id();
       foreach($request->volume as $key => $value){
           if(!is_null($value)){
               $stocks[] = Stock::find($key);
               $param[$key] = $value;
           }
       }
       foreach($stocks as $key => $value){
           $categories[] = category::find($value->category_id);
       }
       return view('category.edit',['param' => $param,'categories' => $categories,'stocks' => $stocks]);
     }
    public function update(Request $request)
    {
      foreach($request->volume as $key => $value){
          $stock = Stock::find($key);
          $stock->volume = $value;
          $stock->save();
      }
      return redirect('/category');
    }


  //削除処理
    public function delete(Request $request)
       {
         $user_id = Auth::id();
         $categories = category::where('user_id',$user_id)->get();
         foreach ($categories as $category){
             $stocks[] = stock::where('category_id', $category->id)->get();
             }
         return view('category.delete',['categories' => $categories,'stocks' => $stocks]);
       }

    public function delete_conf(Request $request)
      {
        unset($request['_token']);
        $user_id = Auth::id();
        foreach ($request->id as $key => $value){
            if(!is_null($value)){
                $stocks[] = stock::find($key);
                $param[$key] = $value;
            }
        }
        foreach($stocks as $key => $value){
            $categories[] = category::find($value->category_id);
        }
        return view('category.delete_conf',['stocks' => $stocks,'categories' => $categories, 'param' => $param]);
      }
    public function destroy(Request $request)
      {
        foreach ($request->id as $key => $value){
            $stock = Stock::find($key)->delete();
        }
        return redirect('/category');
      }

}
