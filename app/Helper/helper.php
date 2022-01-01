<?php

use App\Notification;
use App\Setting;
use App\Subscripe;

function checkSettings(){
    $count = Setting::count();
    return $count;
}

function getNumberOfSubscripes(){
    $count = Subscripe::count();
    return $count;
}

function getRevenuInYear(){
    $count = Subscripe::count();
    return number_format($count * 285 * 12);
}

function getRevenuInMonth(){
    $count = Subscripe::count();
    return number_format($count * 285);
}

function getNumberOfNotifications(){
    $count = Notification::where("viewed" , "=" , 0)->count();
    return $count;
}

function getNotifications(){
    $notifications = Notification::with('Subscriptions')->with('contacts')->orderBy('id' , 'desc')->get();
    // dd($notifications);
    return $notifications;
}