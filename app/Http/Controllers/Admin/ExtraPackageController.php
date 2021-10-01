<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExtraPackage;

class ExtraPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $extra_packages = ExtraPackage::all();
        return view('admin.extra_packages.index' , ['extra_packages' => $extra_packages]);
    }

    public function create(){
        return view('admin.extra_packages.create');
    }

    public function store(Request $request){
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'price' => 'required|max:255'
        ]);

        $extra_packages = new ExtraPackage();
        $extra_packages->name_ar = $request->input('name_ar');
        $extra_packages->name_en = $request->input('name_en');
        $extra_packages->price = $request->input('price');

        $extra_packages->save();

        // return redirect()->route('extra_packages.index' , app()->getLocale());
        return response()->json($extra_packages);
    }

    public function edit($language , $id){
        $extra_packages = ExtraPackage::find($id);
        return view('admin.extra_packages.edit' , ['language' => $language , 'extra_packages' => $extra_packages]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            'price' => 'required|max:255'
        ]);

        $extra_packages = ExtraPackage::find($request->id);
        $extra_packages->name_ar = $request->input('name_ar');
        $extra_packages->name_en = $request->input('name_en');
        $extra_packages->price = $request->input('price');

        $extra_packages->save();

        // return redirect()->route('extra_packages.index' , app()->getLocale());
        return response()->json($extra_packages);
    }

    public function delete($language , $id){
        ExtraPackage::find($id)->delete();
        return redirect()->route('extra_packages.index' , app()->getLocale());
    }
}
