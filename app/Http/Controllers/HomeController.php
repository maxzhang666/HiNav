<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class HomeController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return $this->view('home');
    }

    public function goto()
    {
        $url = request()->input('url', '');
        if (empty($url)) {
            return redirect()->route('home');
        }
        try {
            $url = base64_decode($url);
        } catch (\Exception $e) {
            return redirect()->route('home');
        }
        return $this->view('goto', ['url' => $url]);
    }
}
