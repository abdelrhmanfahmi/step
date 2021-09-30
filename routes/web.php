<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::redirect('/admin' , '/en/admin');

Route::group(['prefix' => '{language}/admin'] , function (){

    Route::get('/' , 'Admin\AdminController@index')->name('admin.dashboard')->middleware('auth:admin');
    Route::get('/login' ,'Auth\AdminController@showLoginForm')->name('admin.login');
    Route::post('/login' ,'Auth\AdminController@login')->name('admin.login.submit');
    Route::get('/logout' ,'Auth\AdminController@logout')->name('admin.logout');

    //Admin Editing
    Route::get('/index' , 'Admin\AdminController@getAdmins')->name('admin.getAdmins');
    Route::get('/edit/{id}' , 'Admin\AdminController@edit')->name('admin.edit');
    Route::put('/update/{id}' , 'Admin\AdminController@update')->name('admin.update');

    //settings
    Route::get('/settings' , 'Admin\SettingController@index')->name('settings.index');
    Route::get('/edit/settings/{id}' , 'Admin\SettingController@edit')->name('settings.edit');
    Route::put('/update/settings/{id}' , 'Admin\SettingController@update')->name('settings.update');

    //benifits
    Route::get('/benifits' , 'Admin\BenifitController@index')->name('benifits.index');
    Route::get('/create/benifits' , 'Admin\BenifitController@create')->name('benifits.create');
    Route::post('/store/benifits' , 'Admin\BenifitController@store')->name('benifits.store');
    Route::get('/edit/benifits/{id}' , 'Admin\BenifitController@edit')->name('benifits.edit');
    Route::put('/update/benifits/{id}' , 'Admin\BenifitController@update')->name('benifits.update');
    Route::get('/delete/benifits/{id}' , 'Admin\BenifitController@delete')->name('benifits.delete');

    //whySteps
    Route::get('/why' , 'Admin\WhyStepsController@index')->name('why.index');
    Route::get('/create/why' , 'Admin\WhyStepsController@create')->name('why.create');
    Route::post('/store/why' , 'Admin\WhyStepsController@store')->name('why.store');
    Route::get('/edit/why/{id}' , 'Admin\WhyStepsController@edit')->name('why.edit');
    Route::put('/update/why/{id}' , 'Admin\WhyStepsController@update')->name('why.update');
    Route::get('/delete/why/{id}' , 'Admin\WhyStepsController@delete')->name('why.delete');

    //common
    Route::get('/common' , 'Admin\CommonController@index')->name('common.index');
    Route::get('/create/common' , 'Admin\CommonController@create')->name('common.create');
    Route::post('/store/common' , 'Admin\CommonController@store')->name('common.store');
    Route::get('/edit/common/{id}' , 'Admin\CommonController@edit')->name('common.edit');
    Route::put('/update/common/{id}' , 'Admin\CommonController@update')->name('common.update');
    Route::get('/delete/common/{id}' , 'Admin\CommonController@delete')->name('common.delete');

    //NewsLetters
    Route::get('/newsletters' , 'Admin\NewsLetterController@index')->name('newsletters.index');
    Route::get('/edit/newsletters/{id}' , 'Admin\NewsLetterController@edit')->name('newsletters.edit');
    Route::put('/update/newsletters/{id}' , 'Admin\NewsLetterController@update')->name('newsletters.update');
    Route::get('/delete/newsletters/{id}' , 'Admin\NewsLetterController@delete')->name('newsletters.delete');

    //Contacts
    Route::get('/contacts' , 'Admin\ContactController@index')->name('contacts.index');
    Route::get('/edit/contacts/{id}' , 'Admin\ContactController@edit')->name('contacts.edit');
    Route::put('/update/contacts/{id}' , 'Admin\ContactController@update')->name('contacts.update');
    Route::get('/delete/contacts/{id}' , 'Admin\ContactController@delete')->name('contacts.delete');

    //Packages
    Route::get('/packages' , 'Admin\PackageController@index')->name('packages.index');
    Route::get('/create/packages' , 'Admin\PackageController@create')->name('packages.create');
    Route::post('/store/packages' , 'Admin\PackageController@store')->name('packages.store');
    Route::get('/edit/packages/{id}' , 'Admin\PackageController@edit')->name('packages.edit');
    Route::put('/update/packages/{id}' , 'Admin\PackageController@update')->name('packages.update');
    Route::get('/delete/packages/{id}' , 'Admin\PackageController@delete')->name('packages.delete');

    //Services
    Route::get('/services' , 'Admin\ServiceController@index')->name('services.index');
    Route::get('/create/services' , 'Admin\ServiceController@create')->name('services.create');
    Route::post('/store/services' , 'Admin\ServiceController@store')->name('services.store');
    Route::get('/edit/services/{id}' , 'Admin\ServiceController@edit')->name('services.edit');
    Route::put('/update/services/{id}' , 'Admin\ServiceController@update')->name('services.update');
    Route::get('/delete/services/{id}' , 'Admin\ServiceController@delete')->name('services.delete');

    Route::get('/getDataAjax/{id}' , 'Admin\PackageController@getDataAjax');

    //Extra Packages
    Route::get('/extra_packages' , 'Admin\ExtraPackageController@index')->name('extra_packages.index');
    Route::get('/create/extra_packages' , 'Admin\ExtraPackageController@create')->name('extra_packages.create');
    Route::post('/store/extra_packages' , 'Admin\ExtraPackageController@store')->name('extra_packages.store');
    Route::get('/edit/extra_packages/{id}' , 'Admin\ExtraPackageController@edit')->name('extra_packages.edit');
    Route::put('/update/extra_packages/{id}' , 'Admin\ExtraPackageController@update')->name('extra_packages.update');
    Route::get('/delete/extra_packages/{id}' , 'Admin\ExtraPackageController@delete')->name('extra_packages.delete');

    //Subscribtions
    Route::get('/subscripes' , 'Admin\SubscripeController@index')->name('subscripes.index');
    Route::get('/edit/subscripes/{id}' , 'Admin\SubscripeController@edit')->name('subscripes.edit');
    Route::put('/update/subscripes/{id}' , 'Admin\SubscripeController@update')->name('subscripes.update');
    Route::get('/delete/subscripes/{id}' , 'Admin\SubscripeController@delete')->name('subscripes.delete');
});