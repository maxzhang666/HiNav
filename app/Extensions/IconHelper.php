<?php

namespace App\Extensions;

class IconHelper
{
    /**
     * @var GLib
     */
    private $glib;

    public function __construct(GLib $glib)
    {
        $this->glib = $glib;
    }

}
