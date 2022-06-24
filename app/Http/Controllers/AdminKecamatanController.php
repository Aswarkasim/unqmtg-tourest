<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Kecamatan;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKecamatanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kecamatan = Kecamatan::paginate(10);
        $data = [
            'title'   => 'Manajemen Kecamatan',
            'kecamatan' => $kecamatan,
            'content' => 'admin/kecamatan/index'
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
            'title'   => 'Manajemen Kecamatan',
            'content' => 'admin/kecamatan/add'
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
        $data = $request->validate([
            'name'        => 'required',
            'cover'              => 'required:mimes:jpg,png',
        ]);

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

        Kecamatan::create($data);
        Alert::success('Sukses', 'Kecamatan telah ditambahkan');
        return redirect('/admin/kecamatan');
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
            'title'   => 'Manajemen Kecamatan',
            'kecamatan'    => Kecamatan::find($id),
            'content' => 'admin/kecamatan/add'
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
        $kecamatan = Kecamatan::find($id);

        $data = $request->validate([
            'name'        => 'required',
            'cover'              => 'mimes:jpg,png',
        ]);

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {

            if ($kecamatan->cover != '') {
                unlink($kecamatan->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $kecamatan->cover;
        }


        $kecamatan->update($data);
        Alert::success('Sukses', 'Kecamatan telah diubah');
        return redirect('/admin/kecamatan');
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
        $kecamatan = Kecamatan::find($id);
        if ($kecamatan->image != '') {
            unlink($kecamatan->image);
        }
        $kecamatan->delete();
        Alert::success('Sukses', 'Kecamatan sukses dihapus');
        return redirect('/admin/kecamatan');
    }
}
