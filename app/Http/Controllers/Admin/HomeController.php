<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home=Home::all();
        return view('admin.home.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $home=new Home();
        return view('admin.home.create',compact('home'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en'=>'required',
            'title_ar'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',

        ]);

        $img = $request->file('image');
        $img_name = rand(). time().$img->getClientOriginalName();
        $img->move(public_path('uploads/Home'), $img_name);

        Home::create([
            'title_en'=>$request->title_en,
            'title_ar'=>$request->title_ar,
            'content_en'=>$request->content_en,
            'content_ar'=>$request->content_ar,
            'image'=>$img_name,
        ]);
        return redirect()->route('admin.home.index')->with('msg','Home added successfully')->with('type', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $home =Home::findOrFail($id);
        File::delete(public_path('uploads/Home/'.$home->image));
        $home->delete();
        return redirect()->route('admin.home.index')->with('msg', 'Home deleted successfully')->with('type', 'danger');


    }
}
