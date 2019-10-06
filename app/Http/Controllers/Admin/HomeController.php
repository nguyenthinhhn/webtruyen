<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['exportJs']]);
    }

    public function exportJs()
    {
        $lang = App::getLocale();
        Cache::forget('lang.js');
        $strings = Cache::rememberForever('lang.js', function () use ($lang) {
            $strings = [];
            $files = glob(resource_path('lang/' . $lang . '/*.php'));
            foreach ($files as $file) {
                $name = basename($file, '.php');
                $strings[$name] = require $file;
            }

            return $strings;
        });
        header('Content-Type: text/javascript');
        echo('window.i18n = ' . json_encode($strings) . ';');
        exit();
    }

    public function index()
    {
        return view('backend.layouts.main');
    }
}
