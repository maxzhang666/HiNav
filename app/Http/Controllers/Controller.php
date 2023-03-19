<?php

namespace App\Http\Controllers;

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
            'keywords' => $this->keywords,
            'description' => $this->description,
        ]);

        return view($view, $data);
    }
}
