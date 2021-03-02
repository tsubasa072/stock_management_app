<?php

namespace App\Http\Controllers;

use App\stock;
use App\category;
use App\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request)
     {
       $comment = array(
         '『キッチン用品』洗剤が +1 されました。' => '折橋',
         '『食材』長ネギが +1 されました。' => '折橋',
         '『キッチン用品』 スポンジの在庫がなくなりました。'=> '折橋',
       );
       $date = date('y-m-d H:i');
       return view('message.index',['date' => $date],['comment' => $comment]);
     }

    public function create(Request $request)
      {
        return view('message.create');
      }
    public function store(Request $request)
      {
        $this->validate($request, Message::$rules);
        $message = new message;
        $form = $request->all();
        unset($form['_token']);
        $message->fill($form)->save();

        return redirect('/message');
      }


    public function edit(Request $request)
      {
        return view('message.edit');
      }
    public function update(Request $request)
      {
        $param = [
          'comment' => $request->comment,
        ];

        DB::table('messages')
              ->where('comment',$request->comment)
              ->update($param);
        return redirect('/message');
      }


    public function delete(Request $request)
      {
        $comment = array(
          '『キッチン用品』洗剤が +1 されました。' => '折橋',
        );
        $date = date('y-m-d H:i');
        return view('message.delete',['date' => $date],['comment' => $comment]);
      }
    public function destroy(Request $request)
      {
        DB::table('messages')
              ->where('title',$request->title)
              ->delete();
        return redirect('/message');
      }
}
