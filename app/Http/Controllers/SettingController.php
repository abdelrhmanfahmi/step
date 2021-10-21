<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Benifit;
use App\Common;
use App\Contact;
use App\ExtraPackage;
use App\NewsLetter;
use App\Notification;
use App\PackagesServices;
use App\Section;
use App\Subscripe;
use App\SubscripeExtraPackage;
use App\SubService;
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

    // public function getPackageServices($id){
    //     $services = PackagesServices::where('package_id' , '=' , $id)->take(5)->get();
    //     return response()->json($services);
    // }

    // public function getPackageWithServices(){
    //     $services = array();
    //     $packages = Package::all();
    //     for($i = 0 ; $i<count($packages) ; $i++){
    //         $getServices = DB::table('packages_services')
    //         ->select('*')
    //         ->where('package_id' , '=' , $packages[$i]->id)
    //         ->take(5)
    //         ->get();
    //         array_push($services , $getServices);
    //     }
    //     return response()->json($services);
    // }

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

    public function getExtraPackages(){
        $extra_packages = ExtraPackage::all();
        return response()->json($extra_packages);
    }

    public function storeSubscriptions(Request $request){
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:subscriptions',
                'company_size' => 'required',
            ]);

            $subscripe = new Subscripe();
            $subscripe->name = $request->input('name');
            $subscripe->email = $request->input('email');
            $subscripe->company_size = $request->input('company_size');

            $subscripe->save();

            if($request->has('extra_package_id')){
                $data = explode("," , $request->input('extra_package_id'));
                foreach($data as $d){
                    SubscripeExtraPackage::create([
                        'subscripe_id' => $subscripe->id,
                        'extra_package_id' => $d
                    ]);
                }
            }

            $notifications = new Notification();
            $notifications->subscripe_id = $subscripe->id;
            $notifications->viewed = 0;
            
            $notifications->save();
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
}
