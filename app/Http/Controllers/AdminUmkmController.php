<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Ramsey\Uuid\Uuid;
use App\Models\Kategori;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUmkmController extends Controller
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
        $kategori_id = request('kategori_id');
        $kategori = Kategori::find($kategori_id);

        $umkm = Umkm::whereKategoriId($kategori_id)->paginate(10);

        $data = [
            'title'   => 'Manajemen ' . $kategori->name,
            'umkm' => $umkm,
            'content' => 'admin/umkm/index'
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

        $kategori_id = request('kategori_id');
        $kategori = Kategori::find($kategori_id);
        $data = [
            'title'   => 'Manajemen ' . $kategori->name,
            'kategori' => $kategori,
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/umkm/add'
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
            'kecamatan_id'        => 'required',
            'alamat'        => 'required',
            'lat'        => 'required',
            'lng'        => 'required',
            'desc'        => 'required',
            'nohp'        => 'required',
            'kategori_id'        => 'required',
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

        Umkm::create($data);
        Alert::success('Sukses', 'Umkm telah ditambahkan');
        return redirect('/admin/umkm?kategori_id=' . $request->kategori_id);
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
        $kategori_id = request('kategori_id');
        $kategori = Kategori::find($kategori_id);
        $data = [
            'title'   => 'Manajemen Umkm',
            'kategori' => $kategori,
            'umkm' => Umkm::find($id),
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/umkm/add'
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
        $umkm = Umkm::find($id);

        $data = $request->validate([
            'name'        => 'required',
            'kecamatan_id'        => 'required',
            'alamat'        => 'required',
            'lat'        => 'required',
            'lng'        => 'required',
            'nohp'        => 'required',
            'desc'        => 'required',
            'kategori_id'        => 'required',

            // 'cover'              => 'required:mimes:jpg,png',
        ]);

        // $data['media_code']

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {

            if ($umkm->cover != '') {
                unlink($umkm->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $umkm->cover;
        }


        $umkm->update($data);
        Alert::success('Sukses', 'Umkm telah diubah');
        return redirect('/admin/umkm?kategori_id=' . $request->kategori_id);
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
        $kategori_id = 1;
        $umkm = Umkm::find($id);
        if ($umkm->cover != '') {
            unlink($umkm->cover);
        }
        $kategori_id = $umkm->kategori_id;
        $umkm->delete();
        Alert::success('Sukses', 'Umkm sukses dihapus');
        return redirect('/admin/umkm?kategori_id=' . $kategori_id);
    }
}
