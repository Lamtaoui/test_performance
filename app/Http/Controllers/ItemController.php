<?php

namespace App\Http\Controllers;

use App\Item;
use App\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->route('home');
    }
    public function delete()
    {
        Todolist::where('user_id',auth::id())->delete();
        return redirect()->route('home');
    }
    public function edit($id)
    {
        $todolist=Todolist::where('id',$id)->first();
        return view('todolist/update')->with('todolist', $todolist);
    }
    public function update(Request $request)
    {
        Todolist::where('user_id',auth::id())->update(['name'=>$request->get('name')]);
        return redirect()->route('home');
    }
}
