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
        $ctgrs = category::where('user_id',$user_id)->get();
         // dd($ctgr);
        foreach ($ctgrs as $ctgr){
          $stks[] = stock::where('category_id', $ctgr->id)->get();
        }// dd($stk);



        return view('bulk.index',['ctgrs' => $ctgrs,'stks' => $stks]);
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
        // dd($request);
        $user_id = Auth::id();
        $categories = category::where('user_id',$user_id)->get();
        // dd($categories);
        $input = $request->all();
        unset($input['_token']);
        // dd($input);


        foreach($input as $key => $value){
          if($value > 0){
          $param[] = stock::where('id',$key)->first();

          // dd($value);
        }
        }

        return view('bulk.edit',['param' => $param
          ,'categories' => $categories,'input' => $input]);
      }
    public function update(Request $request)
      {
        // dd($request);
        $this->validate($request, Stock::$rules);
        // dd($request);
        $stock[] = Stock::find($request->id);
        // dd($stock);
        $form = $request->all();
        unset($form['_token']);
        $stock->fill($form)->save();
        return redirect('/bulk');
      }


    public function delete(Request $request)
      {
        $user_id = Auth::id();
        $ctgrs = category::where('user_id',$user_id)->get();
         // dd($ctgr);
        foreach ($ctgrs as $ctgr){
          $stks[] = stock::where('category_id', $ctgr->id)->get();
        }// dd($stk);
        return view('bulk.delete',['ctgrs' => $ctgrs,'stks' => $stks]);
      }

    public function delete_conf(Request $request)
      {
        $user_id = Auth::id();
        $ctgrs = category::where('user_id',$user_id)->get();
         // dd($ctgr);
        $choice = $_POST['choice'];
        // dd($choice);
        foreach ($choice as $key => $value){
          $delete[] = stock::where('id',$key)->first();
         // dd($delete);
        }


        return view('bulk.delete_conf',['delete' => $delete
          ,'ctgrs' => $ctgrs]);
      }
    public function destroy(Request $request)
      {

        DB::table('stocks')
              ->where('name',$request->name)
              ->delete('name');
        return redirect('/bulk');
      }
}
