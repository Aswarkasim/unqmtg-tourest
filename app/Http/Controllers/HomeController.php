<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Kecamatan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //

        $data = [
            'banner'    => Banner::get(),
            'kecamatan' => Kecamatan::all(),
            'kuliner'   => Umkm::whereKategoriId(3)->get(),
            'content'  => 'home/home/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    public function contact()
    {
        //

        $data = [
            'content'  => 'home/home/contact'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
