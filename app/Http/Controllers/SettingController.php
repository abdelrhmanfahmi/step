<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Benifit;
use App\Common;
use App\Contact;
use App\Events\MyEvent;
use App\NewsLetter;
use App\Notification;
use App\PackagesServices;
use App\Policy;
use App\Section;
use App\Subscripe;
use App\SubService;
use App\Term;
use App\WhySteps;
use DB;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        return response()->json($settings);
    }

    public function getBenifits(){
        $benifits = Benifit::all();
        return response()->json($benifits);
    }

    public function getWhySteps(){
        $why = WhySteps::all();
        return response()->json($why);
    }

    public function getFAQs(){
        $faqs = Common::all();
        return response()->json($faqs);
    }

    public function storeContactUs(Request $request){
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email',
                'address' => 'required',
                'help' => 'required'
            ]);

            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->phone = $request->input('phone');
            $contact->address = $request->input('address');
            $contact->help = $request->input('help');

            $contact->save();

            $notifications = new Notification();
            $notifications->contact_id = $contact->id;
            $notifications->viewed = 0;

            $notifications->save();
            event(new MyEvent($notifications));

        return response()->json($contact);
        });
    }

    public function storNewsLetters(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletters',
        ]);

        $newsLetters = new NewsLetter();
        $newsLetters->email = $request->input('email');

        $newsLetters->save();
        return response()->json($newsLetters);
    }

    public function getServicesFromPackage(){
        $package_service = PackagesServices::all();
        return response()->json($package_service);
    }

    public function storeSubscriptions(Request $request){
        DB::transaction(function () use ($request) {
            $request->validate([
                'store_name' => 'required|max:255',
                'store_link' => 'required',
                'company_kind' => 'required',
                'manager' => 'required|max:255',
                'phone' => 'required',
                'email' => 'required|max:255|email|unique:subscriptions',
                'password' => 'required',
            ]);

            $subscripe = new Subscripe();
            $subscripe->store_name = $request->input('store_name');
            $subscripe->store_link = 'steps.sa.com/' . $request->input('store_link');
            $subscripe->company_kind = $request->input('company_kind');
            $subscripe->manager = $request->input('manager');
            $subscripe->phone = '+966' . $request->input('phone');
            $subscripe->email = $request->input('email');
            $subscripe->password = $request->input('password');

            $subscripe->save();


            $notifications = new Notification();
            $notifications->subscripe_id = $subscripe->id;
            $notifications->viewed = 0;
            
            $notifications->save();
            event(new MyEvent($notifications));
        });
    }

    public function getSubServices(){
        $sub_services = SubService::all();
        return response()->json($sub_services);
    }

    public function getSections(){
        $sections = Section::all();
        return response()->json($sections);
    }

    public function getTerms(){
        $terms = Term::all();
        return response()->json($terms);
    }

    public function getPolicies(){
        $policies = Policy::all();
        return response()->json($policies);
    }
}
