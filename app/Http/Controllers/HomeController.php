<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    const TWITTER = 'Twitterbot/1.0';
    const FACEBOOK = "facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($path = null)
    {
        $sp = explode("/", $path);
        if ($sp[0] == "gear") {
            $id = explode("/", $path)[1];
            $gear = \App\Models\Gear::With("brand")->find($id);
            return view('ogp')->with("gear", $gear); 
        }
        /*
        if (isset($_SERVER["HTTP_USER_AGENT"])) {
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            if ($user_agent == self::TWITTER || $user_agent == self::FACEBOOK) {
                preg_match('/(ja|en|cn|es)\/sample\/(.*?)\/(\d*)/', $_SERVER["REQUEST_URI"], $matches, PREG_OFFSET_CAPTURE);
                if ($matches) {
                    $id = explode("/", $path)[1];
                    $gear = \App\Models\Gear::With("brand")->find($id);
                    return view('ogp')->with("gear", $gear); 
                }
            }
        }
        */
        return view('app');
    }

public function reset() {
    return view('auth.passwords.reset');
}

public function send() {
    return view('auth.passwords.send');
}

public function input() {
    return view('auth.passwords.input');
}

public function complete() {
    return view('auth.passwords.complete');
}

}
