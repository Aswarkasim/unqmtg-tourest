<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Ramsey\Uuid\Uuid;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProductController extends Controller
{
    /*
   **
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = Produk::paginate(10);
        $data = [
            'title'   => 'Manajemen Produk',
            'produk' => $produk,
            'content' => 'admin/produk/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $id = request('umkm_id');
        $umkm = Umkm::find($id);
        $data = [
            'title'   => 'Manajemen ',
            'umkm' => $umkm,
            'content' => 'admin/produk/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Tambahkan kontak WA

        $data = $request->validate([
            'name'        => 'required',
            'umkm_id'        => 'required',
            'kecamatan_id'        => 'required',
            'kategori_id'        => 'required',
            'harga'         => 'required',
            'desc'        => 'required',
            'cover'              => 'required:mimes:jpg,png',
        ]);

        // $data['media_code']

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = NULL;
        }

        Produk::create($data);
        Alert::success('Sukses', 'Produk telah ditambahkan');
        return redirect('/admin/umkm/' . $data['umkm_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'title'   => 'Manajemen Produk',
            'produk' => Produk::find($id),
            'content' => 'admin/produk/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        // die('Adakah');
        $produk = Produk::find($id);

        $data = $request->validate([
            'name'        => 'required',
            'umkm_id'        => 'required',
            'kecamatan_id'        => 'required',
            'kategori_id'        => 'required',
            'harga'         => 'required',
            'desc'        => 'required',
            // 'cover'              => 'required:mimes:jpg,png',
        ]);

        // $data['media_code']

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {

            if ($produk->cover != '') {
                unlink($produk->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $produk->cover;
        }


        $produk->update($data);
        Alert::success('Sukses', 'Produk telah diubah');
        return redirect('/admin/umkm/' . $data['umkm_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //
        $produk = Produk::find($id);
        $umkm_id = $produk->umkm_id;
        if ($produk->cover != '') {
            unlink($produk->cover);
        }
        $produk->delete();
        Alert::success('Sukses', 'Produk sukses dihapus');
        return redirect('/admin/umkm/' . $umkm_id);
    }
}
