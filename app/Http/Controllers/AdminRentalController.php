<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Rental;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminRentalController extends Controller
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
        $rental = Rental::paginate(10);
        $data = [
            'title'   => 'Manajemen Rental',
            'rental' => $rental,
            'content' => 'admin/rental/index'
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
            'title'   => 'Manajemen Rental',
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/rental/add'
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

        Rental::create($data);
        Alert::success('Sukses', 'Rental telah ditambahkan');
        return redirect('/admin/rental');
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
            'title'   => 'Manajemen Rental',
            'rental' => Rental::find($id),
            'kecamatan' => Kecamatan::all(),
            'content' => 'admin/rental/add'
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
        $rental = Rental::find($id);

        $data = $request->validate([
            'name'        => 'required',
            'kecamatan_id'        => 'required',
            'alamat'        => 'required',
            'lat'        => 'required',
            'lng'        => 'required',
            'desc'        => 'required',
            // 'cover'              => 'required:mimes:jpg,png',
        ]);

        // $data['media_code']

        //perbaiki upload covernya
        if ($request->hasFile('cover')) {

            if ($rental->cover != '') {
                unlink($rental->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/images/';
            $cover->move($storage, $file_name);
            $data['cover'] = $storage . $file_name;
        } else {
            $data['cover'] = $rental->cover;
        }


        $rental->update($data);
        Alert::success('Sukses', 'Rental telah diubah');
        return redirect('/admin/rental');
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
        $rental = Rental::find($id);
        if ($rental->cover != '') {
            unlink($rental->cover);
        }
        $rental->delete();
        Alert::success('Sukses', 'Rental sukses dihapus');
        return redirect('/admin/rental');
    }
}
