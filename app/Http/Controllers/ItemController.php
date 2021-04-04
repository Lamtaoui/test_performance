<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todolist;

class ItemController extends Controller
{
    public function index()
    {
        $todolist=Todolist::where('user_id',auth::id())->first();
        $items=Item::where('todolist_id',$todolist->id)->get();
        return view('item/preview')->with('items', $items);
    }
    public function create()
    {
        return view('item/create');
    }
    public function add(Request $request)
    {
        $todolist=Todolist::where('user_id',auth::id())->first();
        Item::create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'todolist_id'=> $todolist->id,
        ]);
        return redirect()->route('items');
    }
    public function delete($id)
    {
        Item::where('id',$id)->delete();
        return redirect()->route('items');
    }
    public function edit($id)
    {
        $item=Item::where('id',$id)->first();
        return view('item/update')->with('item', $item);
    }
    public function update(Request $request)
    {
        Item::where('id',$request->get('id'))->update(['name'=>$request->get('name'),'content'=>$request->get('content')]);
        return redirect()->route('items');
    }
}
