<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class AdminSaranController extends Controller
{
    //
    function index()
    {
        $data = [
            'saran'     => Saran::paginate(10),
            'content' => 'admin/saran/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
    function detail($id)
    {
        $data = [
            'saran'     => Saran::find($id),
            'content' => 'admin/saran/detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
