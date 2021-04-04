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
    public function is_valid(Request  $request){
        $item=Item::where('name',$request->get('name'))->first();

        if(empty($item)){
            return true;
        }else{
            return false;
        }
    }
    public function add(Request $request)
    {
        $valid=$this->is_valid($request);
        if($valid==false){
            return redirect()->back() ->with('alert', 'the name already exist');
        }
        if(strlen($request->get('content'))>1000){
            return redirect()->back() ->with('alert', 'content length passed 1000 ');
        }
        $todolist=Todolist::where('user_id',auth::id())->first();
        $cp=Item::where('todolist_id',$todolist->id)->count();
        if($cp==8){
            //$this->sendMail();
        }
        $item=Item::where('todolist_id',$todolist->id)->latest('created_at')->first();;

        if($cp<10) {
            if(empty($item)){
                Item::create([
                    'name' => $request->get('name'),
                    'content' => $request->get('content'),
                    'todolist_id' => $todolist->id,
                ]);
                return redirect()->route('items');
            }else{
                $current_timestamp = \Carbon\Carbon::now()->toDateTimeString();
                $start = Carbon::parse($item->created_at);
                $end = Carbon::parse($current_timestamp);
                $diff=$end->diffInMinutes($start);
                if($diff>0){
                    Item::create([
                        'name' => $request->get('name'),
                        'content' => $request->get('content'),
                        'todolist_id' => $todolist->id,
                    ]);
                    return redirect()->route('items');
                }else{
                    return redirect()->back() ->with('alert', 'you have to wait 30 minutes to add an item');
                }
            }
        }else{
        return redirect()->back() ->with('alert', 'you already have 10 items'  );
    }
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
