<?php

namespace App\Http\Controllers;

use App\Extensions\Constants;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $title;
    private $title_after;
    private $url;
    private $logo;

    private $keywords;
    private $description;
    private $logo_white;

    public function __construct()
    {
        $this->title = admin_setting(Constants::Site_Title);
        //TODO 页面内渲染明细标题
//        $this->title_after = Route::is('home') ? '' : '';
        $this->url = admin_setting(Constants::Site_Url);
        $this->logo = admin_setting(Constants::Icon_Logo);
        $this->logo_white = admin_setting(Constants::Icon_Logo_White);

        $this->keywords = admin_setting(Constants::Site_Keywords);
        $this->description = admin_setting(Constants::Site_Description);
    }


    /**
     * @param $view
     * @param array $data
     * @return Application|Factory|View
     */
    protected function view($view, array $data = [])
    {
        $data = array_merge($data, [
            'title' => $this->title,
            'title_after' => $this->title_after,
            'url' => $this->url,
            'logo' => $this->logo,
            'logo_white' => $this->logo_white,
            'keywords' => $this->keywords,
            'description' => $this->description,
        ]);

        return view($view, $data);
    }
}
