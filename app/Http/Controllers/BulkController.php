<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BulkController extends Controller
{
// トップページ
    public function index(Request $request)
    {
        $user_id = Auth::id();
        $ctgrs = category::where('user_id',$user_id)->get();
        foreach ($ctgrs as $ctgr){
            $stks[] = stock::where('category_id', $ctgr->id)->get();
        }
        return view('bulk.index',['ctgrs' => $ctgrs,'stks' => $stks]);
    }

// 登録処理
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

// 更新処理
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
        return view('bulk.edit',['param' => $param,'categories' => $categories,'stocks' => $stocks]);
    }

    public function update(Request $request)
    {
        foreach($request->volume as $key => $value){
            $stock = Stock::find($key);
            $stock->volume = $value;
            $stock->save();
        }
        return redirect('/bulk');
    }

// 削除処理
    public function delete(Request $request)
    {
        $user_id = Auth::id();
        $ctgrs = category::where('user_id',$user_id)->get();
        foreach ($ctgrs as $ctgr){
            $stks[] = stock::where('category_id', $ctgr->id)->get();
            }
        return view('bulk.delete',['ctgrs' => $ctgrs,'stks' => $stks]);
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
        return view('bulk.delete_conf',['stocks' => $stocks,'categories' => $categories, 'param' => $param]);
    }

    public function destroy(Request $request)
    {
    foreach ($request->id as $key => $value){
        $stock = Stock::find($key)->delete();
    }
        return redirect('/bulk');
    }
}
