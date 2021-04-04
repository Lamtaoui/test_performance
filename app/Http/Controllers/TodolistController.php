<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Todolist;

class TodolistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists=Todolist::where('user_id',auth::id())->get();
        return view('todolist/preview')->with('todoLists', $todolists);
    }
    public function create()
    {
        return view('todolist/create');
    }
    public function is_valid(){
        $todolist=Todolist::where('user_id',auth::id())->first();
        if(!empty($todolist)){
            return false;
        }else{
            return true;
        }
    }
    public function add(Request $request)
    {
       $valid=$this->is_valid();
        if($valid==false){
            return redirect()->back() ->with('alert', 'you have already a todolist');
        }
            Todolist::create([
                'name' => $request->get('name'),
                'user_id'=> auth::id(),
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
