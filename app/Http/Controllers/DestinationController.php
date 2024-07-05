<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DestinationController extends Controller
{

    public function test()
    {
        $data = Destination::with('ratings')->get();

        // Hitung rata-rata rating untuk setiap destinasi
        $data->each(function ($destination) {
            $destination->averageRating = $destination->ratings->avg('rating');
        });

        return view('test', compact('data'));
    }

    public function dashboard(){

        return view('dashboard');

    }

    public function destination(){

        $data = Destination::get();

        return view('destination',compact('data'));
    }

    public function create_destination(){
        return view('createDestination');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'image'     => 'required|mimes:png,jpg,jpeg|max:4048',
            'title'     => 'required',
            'price'     => 'required',
            'content'   => 'required',
            'status'    => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $image = $request->file('image');
        $filename = date('Y-m-d').$image->getClientOriginalName();
        $path = 'image-destination/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($image));

        $data['image']      = $filename;
        $data['title']      = $request->title;
        $data['price']      = $request->price;
        $data['content']    = $request->content;
        if ($request->status) {
            $data['status']       = $request->status;
        }

        destination::create($data);

        // return redirect('/admin/destination');
        return redirect()->route('destination');

    }

    public function edit(Request $request,$id){
        $data = destination::find($id);

        return view('editDestination',compact('data'));
    }

    public function update(Request $request,$id){

        $validator = Validator::make($request->all(),[
            'image' => 'nullable',
            'title' => 'required',
            'price' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['image']      = $request->image;
        $data['title']       = $request->title;
        $data['price']       = $request->price;
        $data['content']       = $request->content;
        if ($request->status) {
            $data['status']       = $request->status;
        }

        destination::whereId($id)->update($data);

        return redirect()->route('destination');

    }

    public function delete(Request $request,$id){

        $data = Destination::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('destination');
    }

    public function storeRating(Request $request, Destination $destination)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        $destination->ratings()->create($request->all());

        return redirect()->route('test', $destination)->with('success', 'Rating added successfully');
        // return redirect()->route('destination.show', $destination)->with('success', 'Rating berhasil ditambahkan');
    }

    // public function show(Destination $destination)
    // {
    //     $averageRating = $destination->averageRating();

    //     return view('test', ['destination' => $destination,'averageRating' => $averageRating,]);
    // }

}
