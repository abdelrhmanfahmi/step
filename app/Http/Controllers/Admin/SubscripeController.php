<?php

namespace App\Http\Controllers\Admin;

use App\ExtraPackage;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use App\Subscripe;

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
        $subscripes = Subscripe::find($id);
        Notification::where('subscripe_id' , '=' , $id)->update(['viewed' => 1]);
        return view('admin.subscripes.edit' , ['language' => $language , 'subscripes' => $subscripes]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'company_size' => 'required',
        ]);

        $subscripes = Subscripe::find($request->id);
        $subscripes->name = $request->input('name');
        $subscripes->email = $request->input('email');
        $subscripes->company_size = $request->input('company_size');

        $subscripes->save();

        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function delete($language , $id){
        Subscripe::find($id)->delete();
        return redirect()->route('subscripes.index' , app()->getLocale());
    }
}
