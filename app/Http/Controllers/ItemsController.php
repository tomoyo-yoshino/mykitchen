<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use Illuminate\Support\Facades\Storage;


class ItemsController extends Controller
{
    // getでitemss/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        $items = Item::paginate(10);
        
        return view('items.index', [
            'items' => $items,
        ]);
    }
    
    // getでitems/createにアクセスされた場合の「新規登録画面表示処理」
    public function create(Request $request)
    {
        return view ('items.create', [
            'item' => Item::make()
        ]);
    }
    
    
    // postでitems/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'file' => 'nullable|file',
        ]);
        $item = new Item;
        
        $file = $request->file('file')->store('items', 's3');
        $item->user_id = \Auth::id();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->file_name = $file;
        
        $item->save();
        
        return redirect()->route('items.index');
    }
    
    // getでitems/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $item = Item::findOrFail($id);
        
        return view('items.show', [
            'item' => $item,
        ]);
    }
    
    // getでitems/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('items.edit', [
            'item' => $item, 
        ]);
    }
    
    // putまたはpatchでitems/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'file_name' => 'required|max:191',
        ]);
        
        $item = Item::find($id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        
        return redirect('/');
    }
    
    // deleteでitems/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $item = \App\Item::find($id);
        
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }
        
        return redirect()->route('items.index');
    }
}