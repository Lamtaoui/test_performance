<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todolist;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ItemController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/items';
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:items',
            'content' => 'required|string|min:255',
        ]);
    }
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
    public function is_valid(array  $request){
        $item2=Item::where('name',$request['name'])->first();
        $valid=true;
        if(!empty($item2)){
            $valid=false;
        }
        if(strlen($request['content'])>1000){
            $valid=false;
        }
        $todolist=Todolist::where('user_id',auth::id())->first();
        $cp=Item::where('todolist_id',$todolist->id)->count();
        if($cp==8){
            //$this->sendMail();
        }
        if($cp>10) {
            $valid=false;
        }
        $item=Item::where('todolist_id',$todolist->id)->latest('created_at')->first();
        if(!empty($item)){
        $current_timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $start = Carbon::parse($item->created_at);
        $end = Carbon::parse($current_timestamp);
        $diff=$end->diffInMinutes($start);
        if($diff<30){
            $valid=false;
        }
        }
        return $valid;
    }
    public function add(Request $request)
    {

        $valid=$this->is_valid($request->all());
        if($valid==false){
            return redirect()->back() ->with('alert', 'the data not valid');
        }
        $todolist=Todolist::where('user_id',auth::id())->first();
                Item::create([
                    'name' => $request->get('name'),
                    'content' => $request->get('content'),
                    'todolist_id' => $todolist->id,
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
