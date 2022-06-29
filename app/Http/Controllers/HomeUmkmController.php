<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class HomeUmkmController extends Controller
{
    //
    function penginapan()
    {
        $kecamatan_id = request('kecamatan_id');
        $Umkm = [];
        if ($kecamatan_id) {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(4)->whereKecamatanId($kecamatan_id)->paginate(9);
        } else {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(4)->paginate(9);
        }
        $data = [
            'umkm'          => $Umkm,
            'kecamatan'     => Kecamatan::all(),
            'title'         => 'Penginapan',
            'link'          => 'penginapan',
            'desc'          => 'Cari penginapan apa saja yang ada di Mamuju Tengah',
            'content'       => 'home/umkm/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function rental()
    {
        $kecamatan_id = request('kecamatan_id');
        $Umkm = [];
        if ($kecamatan_id) {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(1)->whereKecamatanId($kecamatan_id)->paginate(9);
        } else {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(1)->paginate(1);
        }
        $data = [
            'umkm'          => $Umkm,
            'kecamatan'     => Kecamatan::all(),
            'title'         => 'Rental Mobil',
            'link'          => 'rental',
            'desc'          => 'Mau kendaraan untuk keliling? di Mamuju tengah juga ada',
            'content'       => 'home/umkm/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function jajanan()
    {
        $kecamatan_id = request('kecamatan_id');
        $Umkm = [];
        if ($kecamatan_id) {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(3)->whereKecamatanId($kecamatan_id)->paginate(9);
        } else {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(3)->paginate(1);
        }
        $data = [
            'umkm'          => $Umkm,
            'kecamatan'     => Kecamatan::all(),
            'title'         => 'Jajanan Oleh-oleh',
            'link'          => 'jajanan',
            'desc'          => 'Jangan lupa cari oleh-oleh di Mamuju Tengah',
            'content'       => 'home/umkm/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function kuliner()
    {
        $kecamatan_id = request('kecamatan_id');
        $Umkm = [];
        if ($kecamatan_id) {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(3)->whereKecamatanId($kecamatan_id)->paginate(9);
        } else {
            $Umkm = Umkm::with('kecamatan')->whereKategoriId(3)->paginate(1);
        }
        $data = [
            'umkm'          => $Umkm,
            'kecamatan'     => Kecamatan::all(),
            'title'         => 'Kuliner',
            'link'          => 'kuliner',
            'desc'          => 'Kurang lengkap kalau tidak makan-makan dulu',
            'content'       => 'home/umkm/index'
        ];
        return view('home/layouts/wrapper', $data);
    }

    function detail($id)
    {
        $umkm   = Umkm::with('kecamatan')->find($id);
        $data = [
            'umkm'          => $umkm,
            'saran'         => Umkm::where('id', '!=', $id)->where('kecamatan_id', $umkm->kecamatan_id)->get(),
            'content'       => 'home/umkm/detail'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
