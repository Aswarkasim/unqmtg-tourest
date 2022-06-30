<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kecamatan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        //count kecamatan
        $kecamatan = Kecamatan::count();
        //count wisata
        $wisata = Wisata::count();
        $rental = Umkm::whereKategoriId(1)->count();
        $jajanan = Umkm::whereKategoriId(2)->count();
        $kuliner = Umkm::whereKategoriId(3)->count();
        $penginapan = Umkm::whereKategoriId(4)->count();


        $data = [
            'kecamatan' => $kecamatan,
            'wisata' => $wisata,
            'rental' => $rental,
            'jajanan' => $jajanan,
            'kuliner' => $kuliner,
            'penginapan' => $penginapan,
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
