<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function dashboard(){

        $userCount = User::count();
        $destinationCount = Destination::count();
        $orderCount = Order::count();

        return view('dashboard', compact('userCount', 'destinationCount','orderCount'));

    }

    public function index(){

        $data = User::get();

        return view('index',compact('data'));
    }

    public function create(){

        return view('create');

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['password']   = Hash::make($request->password);

        user::create($data);

        return redirect()->route('index');

    }

    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('edit',compact('data'));
    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'nullable',
            'level' => 'required|in:admin,manager,client,user',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->name;
        $data['level']       = $request->level;

        if($request->password){
            $data['password']   = Hash::make($request->password);
        }

        user::whereId($id)->update($data);

        return redirect()->route('index');

    }

    public function delete(Request $request,$id){

        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('index');
    }

}
