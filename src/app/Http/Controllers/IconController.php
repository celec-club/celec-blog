<?php

namespace App\Http\Controllers;

use App\Multiavatar;

class IconController extends Controller
{
    public function get()
    {
        $multiavatar = new Multiavatar();

        return $multiavatar(substr(md5(time()), 0, 20), null, null);
    }
}
