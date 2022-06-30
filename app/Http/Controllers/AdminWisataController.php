<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Ramsey\Uuid\Nonstandard\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminWisataController extends Controller
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
        $wisata = Wisata::paginate(10);
        $data = [
            'title'   => 'Manajemen Wisata',
            'wisata' => $wisata,
            'content' => 'admin/wisata/index'
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

        $data = [
            'title'   => 'Manajemen Wisata',
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/wisata/add'
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
            // 'lat'        => 'required',
            // 'lng'        => 'required',
            'maps'          => 'required',
            'harga'         => 'required',
            'satuan'         => 'required',
            'desc'        => 'required',
            'nohp'        => 'required',
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

        Wisata::create($data);
        Alert::success('Sukses', 'Wisata telah ditambahkan');
        return redirect('/admin/wisata');
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
            'title'   => 'Manajemen Wisata',
            'wisata' => Wisata::find($id),
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/wisata/add'
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
        $wisata = Wisata::find($id);

        $data = $request->validate([
            'name'        => 'required',
            'kecamatan_id'        => 'required',
            'alamat'        => 'required',
            // 'lat'        => 'required',
            // 'lng'        => 'required',
            'maps'        => 'required',
            'nohp'        => 'required',
            'desc'        => 'required',
            // 'cover'              => 'required:mimes:jpg,png',
        ]);

        // $data['media_code']

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {

            if ($wisata->cover != '') {
                unlink($wisata->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $wisata->cover;
        }


        $wisata->update($data);
        Alert::success('Sukses', 'Wisata telah diubah');
        return redirect('/admin/wisata');
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
        $wisata = Wisata::find($id);
        dd($wisata);
        if ($wisata->cover != '') {
            unlink($wisata->cover);
        }
        $wisata->delete();
        Alert::success('Sukses', 'Wisata sukses dihapus');
        return redirect('/admin/wisata');
    }
}
