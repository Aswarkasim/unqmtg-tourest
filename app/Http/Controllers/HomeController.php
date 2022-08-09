<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Umkm;
use App\Models\Saran;
use App\Models\Banner;
use App\Models\Produk;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Models\Configuration;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        //

        $kuliner = Produk::with(['umkm', 'kecamatan'])->inRandomOrder()->whereKategoriId(3)->limit(4)->get();
        $rental = Produk::with(['umkm', 'kecamatan'])->inRandomOrder()->whereKategoriId(1)->limit(4)->get();
        $data = [
            'banner'    => Banner::get(),
            'kecamatan' => Kecamatan::all(),
            'kuliner'   => $kuliner,
            'rental'   => $rental,
            'content'  => 'home/home/index'
        ];
        dd($rental);
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
        Alert::success('Sukses', 'Saran anda telah terkirim');
        return redirect()->back()->with('success', 'Saran anda telah terkirim');
    }
}
