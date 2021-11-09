<?php

namespace App\Http\Controllers\Admin;

use App\ExtraPackage;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use App\Subscripe;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

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

    public function show($language , $id){
        $subscripes = Subscripe::find($id);
        return view('admin.subscripes.show' , ['language' => $language , 'subscripes' => $subscripes]);
    }

    public function accept($language , $id){
        Subscripe::find($id)->update(['status' => 1]);
        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function edit($language , $id){
        $subscripes = Subscripe::find($id);
        Notification::where('subscripe_id' , '=' , $id)->update(['viewed' => 1]);
        return view('admin.subscripes.edit' , ['language' => $language , 'subscripes' => $subscripes]);
    }

    public function update(Request $request , $id){
        $request->validate([
            'store_name' => 'required|max:255',
            'store_link' => 'required',
            'company_kind' => 'required',
            'manager' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        $subscripes = Subscripe::find($request->id);
        $subscripes->store_name = $request->input('store_name');
        $subscripes->store_link = $request->input('store_link');
        $subscripes->company_kind = $request->input('company_kind');
        $subscripes->manager = $request->input('manager');
        $subscripes->phone = $request->input('phone');
        $subscripes->email = $request->input('email');
        $subscripes->password = $request->input('password');
        $subscripes->order_percentage = $request->input('order_percentage');

        $subscripes->save();

        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function delete($language , $id){
        Subscripe::find($id)->delete();
        return redirect()->route('subscripes.index' , app()->getLocale());
    }

    public function getNotifications(){
        $notifications = Notification::with('subscriptions')->with('contacts')->orderBy('id' , 'desc')->get();
        $html = View::make('admin.subscripes.notifications', ['notifications' => $notifications])->render();
        return response()->json($html);
    }

    public function getNumberNotification(){
        $count = Notification::where("viewed" , "=" , 0)->count();
        return response()->json($count);
    }

    public function sales(){
        return view('admin.sales');
    }

    public function showSales($language , $id){
        return view('admin.showSales' , ['language' => $language]);
    }
}
