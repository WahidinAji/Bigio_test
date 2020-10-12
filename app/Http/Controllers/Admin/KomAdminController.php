<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Auth;

class KomAdminController extends Controller
{
    public function edit(Komoditas $komoditas)
    {
        if (Auth::guard('admin')->check()) {
            return \view('admin.edit', \compact('komoditas'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
    public function update(Request $request, Komoditas $komoditas)
    {
        if (Auth::guard('admin')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'jenis' => 'required',
                'harga' => 'required',
                'status' => 'required|max:1'
            ]);
            $komoditas = Komoditas::find($komoditas->id);
            // \dd($komoditas);
            $name_img = $komoditas->img;
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name_img = \time() . "_" . $file->getClientOriginalName();
                $tujuan_upload = 'img/komoditas/';
                $file->move($tujuan_upload, $name_img);
                File::delete('img/komoditas/' . $komoditas->img);
            }
            $komoditas->update([
                'name' => $request->name,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'img' => $name_img,
                'status' => $request->status,
                'id_surveyor' => $request->id_surveyor
            ]);
            return \redirect('super-dashboard')->with(['msg' => 'Harga disetujui']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function destroy(Komoditas $komoditas)
    {
        if (Auth::guard('admin')->check()) {
            Komoditas::destroy($komoditas->id);
            return \redirect()->back()->with(['message' => 'Game deleted successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
