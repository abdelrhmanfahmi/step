<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $packages = Package::all();
        return view('admin.packages.index' , ['packages' => $packages]);
    }

    public function create(){
        return view('admin.packages.create');
    }

    public function store(Request $request){
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'price' => 'required',
            'user_ar' => 'required',
            'user_en' => 'required'
        ]);

        $packages = new Package();
        $packages->name_ar = $request->input('name_ar');
        $packages->name_en = $request->input('name_en');
        $packages->price = $request->input('price');
        $packages->user_ar = $request->input('user_ar');
        $packages->user_en = $request->input('user_en');

        $packages->save();

        // return redirect()->route('packages.index' , app()->getLocale());
        return response()->json($packages);
    }

    public function edit($language , $id){
        $packages = Package::find($id);
        return view('admin.packages.edit' , ['language' => $language , 'packages' => $packages]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'price' => 'required',
            'user_ar' => 'required',
            'user_en' => 'required'
        ]);

        $packages = Package::find($request->id);
        $packages->name_ar = $request->input('name_ar');
        $packages->name_en = $request->input('name_en');
        $packages->price = $request->input('price');
        $packages->user_ar = $request->input('user_ar');
        $packages->user_en = $request->input('user_en');

        $packages->save();

        // return redirect()->route('packages.index' , app()->getLocale());
        return response()->json($packages);
    }

    public function delete($language , $id){
        Package::find($id)->delete();
        return redirect()->route('packages.index' , app()->getLocale());
    }
}
