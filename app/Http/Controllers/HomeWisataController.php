<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Wisata;
use Illuminate\Http\Request;

class HomeWisataController extends Controller
{
    //
    public function index()
    {
        //
        $kecamatan_id = request('kecamatan_id');
        $wisata = [];
        if ($kecamatan_id) {
            $wisata = Wisata::with('kecamatan')->whereKecamatanId($kecamatan_id)->paginate(9);
        } else {
            $wisata = Wisata::with('kecamatan')->paginate(9);
        }
        // dd($wisata);
        $data = [
            'kecamatan' => Kecamatan::all(),
            'wisata'    => $wisata,
            'content'  => 'home/wisata/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    public function detail($id)
    {
        //

        $data = [
            'kecamatan' => Kecamatan::all(),
            'wisata'    => Wisata::with('kecamatan')->find($id),
            'saran'     => Wisata::limit(4)->get(),
            'content'  => 'home/wisata/detail'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
