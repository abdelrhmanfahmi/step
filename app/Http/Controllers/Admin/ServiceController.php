<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;
use App\PackagesServices;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $services = PackagesServices::paginate(10);
        return view('admin.services.index' , ['services' => $services]);
    }

    public function create(){
        $packages = Package::all();
        return view('admin.services.create' , ['packages' => $packages]);
    }

    public function store(Request $request){
        $request->validate([
            'service_ar' => 'required|max:255',
            'service_en' => 'required|max:255',
            'package_id' => 'required'
        ]);

        $services = new PackagesServices();
        $services->service_ar = $request->input('service_ar');
        $services->service_en = $request->input('service_en');
        $services->package_id = $request->input('package_id');

        $services->save();

        return redirect()->route('services.index' , app()->getLocale());
    }

    public function edit($language , $id){
        $packages = Package::all();
        $services = PackagesServices::find($id);
        return view('admin.services.edit' , ['language' => $language , 'services' => $services , 'packages' => $packages]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'service_ar' => 'required|max:255',
            'service_en' => 'required|max:255',
            'package_id' => 'required'
        ]);

        $services = PackagesServices::find($request->id);
        $services->service_ar = $request->input('service_ar');
        $services->service_en = $request->input('service_en');
        $services->package_id = $request->input('package_id');

        $services->save();

        return redirect()->route('services.index' , app()->getLocale());
    }

    public function delete($language , $id){
        PackagesServices::find($id)->delete();
        return redirect()->route('services.index' , app()->getLocale());
    }
}
