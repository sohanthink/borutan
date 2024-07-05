<?php

if (!function_exists('setting')) {
    function setting($name, $default = null)
    {
        return \App\Models\Setting::getByName($name, $default);
    }
}
if (!function_exists('active_menu')) {
    function active_menu($name)
    {
        $class = ''; 
        if (request()->routeIs($name)) {
            $class = 'active';
        }
        return $class;
    }
}

if (!function_exists('view_avater')) {
    function view_avater($avater)
    {
        $file = asset('default.webp');
        if (!empty($avater)) {
            $file =  asset('uploads/user/' . $avater);
        }
        return $file;
    }
}
if (!function_exists('user_name_with_id')) {
    function user_name_with_id($user)
    {
        $name = 'User Not Found';
        if($user){
            $name ='('.$user->id.')'.$user->first_name.' '.$user->last_name;
        }
       
        return $name;
    }
}

if (!function_exists('user_name')) {
    function user_name($user)
    {
        $name = 'User Not Found';
        if($user){
            $name =$user->first_name.' '.$user->last_name;
        }
       
        return $name;
    }
}


if (!function_exists('page')) {
    function page($name, $default = null)
    {
        return \App\Models\Page::getByName($name, $default);
    }
}