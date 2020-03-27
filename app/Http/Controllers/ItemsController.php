<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use Illuminate\Support\Facades\Storage;


class ItemsController extends Controller
{
    
    public function index()
    {
        $items = Item::paginate(10);
        
        return view('items.index', [
            'items' => $items,
        ]);
    }
    
    
    public function create(Request $request)
    {
        return view ('items.create', [
            'item' => Item::make()
        ]);
    }
    
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'file' => 'nullable|file',
        ]);
        $item = new Item;
        
        $file = Storage::disk('s3')->putFile('items', $request->file('file'), 'public');
        $item->user_id = \Auth::id();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->file_name = $file;
        
        $item->save();
        
        return redirect()->route('items.index');
    }
    
    
    public function show($id)
    {
        $item = Item::findOrFail($id);
        
        return view('items.show', [
            'item' => $item,
        ]);
    }
    
    
    public function edit($id)
    {
        $item = Item::find($id);
        
        return view('items.edit', [
            'item' => $item, 
        ]);
    }
    
   
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
    
    
    public function destroy($id)
    {
        $item = \App\Item::find($id);
        
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }
        
        return redirect()->route('items.index');
    }
}