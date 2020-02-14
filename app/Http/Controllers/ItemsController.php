<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $items = $user->items()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'items' => $items,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $request->user()->items()->create([
            'content' => $request->content,
        ]);
        
        return back();
    }
    
    public function destroy($id)
    {
        $item = \App\Item::find($id);
        
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }
        
        return back();
    }
}