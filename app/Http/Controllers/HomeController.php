<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Umkm;
use App\Models\Saran;
use App\Models\Banner;
use App\Models\Configuration;
use App\Models\Kecamatan;
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
            'kontak'   => Configuration::first(),
            'content'  => 'home/home/contact'
        ];
        return view('home/layouts/wrapper', $data);
    }

    //functioon form send saran
    public function sendSaran(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'nohp' => 'required',
            'subjek' => 'required',
            'desc' => 'required'
        ]);
        Saran::create($data);
        return redirect()->back()->with('success', 'Saran anda telah terkirim');
    }
}
