<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    //お気に入り登録するアクション
    public function store($id)
    {
        //認証済みユーザが、idのmicropostをお気に入り登録する
        \Auth::user()->favorite($id);
        //前のURLへリダイレクト
        return back();
    }
    //お気に入り登録解除アクション
    public function destroy($id)
    {
        //認証済みユーザが、idのmicropostのお気に入りを解除する
        \Auth::user()->unfavorite($id);
        //前のURLへリダイレクト
        return back();
    }
    
}
