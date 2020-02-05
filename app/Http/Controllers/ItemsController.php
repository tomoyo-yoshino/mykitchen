<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;    // 追加


class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでitems/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $items = Item::all();
        
        return view('items.index', [
            'items' => $items,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでitems/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $item = new Item;
        
        return view('items.create', [
            'item' => $item,   
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    // postでitems/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $item = new Item;
        $item->content = $request->content;
        $item->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     // getでitems/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $item = Item::find($id);
        
        return view('items.show', [
            'item' => $item,    
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // getでitems/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('items.edit', [
            'item' =>$item, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // putまたはpatchでitems/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $item->content = $request->content;
        $item->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    // deleteでitems/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        
        return redirect('/');
    }
}
