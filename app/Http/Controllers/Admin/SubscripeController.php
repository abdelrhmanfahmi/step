<?php

namespace App\Http\Controllers\Admin;

use App\ExtraPackage;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Package;
use Illuminate\Http\Request;
use App\Subscripe;
use App\SubscripeExtraPackage;
use DB;

class SubscripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $subscripes = Subscripe::orderBy('id' , 'desc')->get();
        return view('admin.subscripes.index' , ['subscripes' => $subscripes]);
    }

    public function edit($language , $id){
        $packages = Package::all();
        $subscripes = Subscripe::find($id);
        $extraPackages = ExtraPackage::all();
        $extra = SubscripeExtraPackage::where('subscripe_id' , '=' , $id)->get();
        Notification::where('subscripe_id' , '=' , $id)->update(['viewed' => 1]);
        return view('admin.subscripes.edit' , ['language' => $language , 'subscripes' => $subscripes , 'packages' => $packages , 'extra' => $extra ,  'extraPackages' => $extraPackages]);
    }

    public function update(Request $request , $id){
        DB::transaction(function () use ($request , $id) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255|email',
                'company_size' => 'required',
                'package_id' => 'required'
            ]);

            $subscripes = Subscripe::find($request->id);
            $subscripes->name = $request->input('name');
            $subscripes->email = $request->input('email');
            $subscripes->company_size = $request->input('company_size');
            $subscripes->package_id = $request->input('package_id');

            $subscripes->save();
            if($request->has('extra_package_id')){

                SubscripeExtraPackage::where('subscripe_id' , '=' , $request->id)->delete();
                foreach($request->input('extra_package_id') as $d){
                    SubscripeExtraPackage::create([
                        'subscripe_id' => $subscripes->id,
                        'extra_package_id' => $d
                    ]);
                }
                
            }
        });

        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function delete($language , $id){
        Subscripe::find($id)->delete();
        return redirect()->route('subscripes.index' , app()->getLocale());
    }
}
