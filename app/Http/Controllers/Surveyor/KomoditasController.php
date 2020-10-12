<?php

namespace App\Http\Controllers\Surveyor;

use App\Http\Controllers\Controller;
use File;
use App\Model\Komoditas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomoditasController extends Controller
{
    public function create()
    {
        return \view('surveyor.create');
    }
    public function store(Request $request)
    {
        if (Auth::guard('surveyor')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'jenis' => 'required',
                'harga' => 'required',
                'img' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('img');
            $name_img = \time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'img/komoditas/';
            $file->move($tujuan_upload, $name_img);
            // dd($name_img);
            Komoditas::create([
                'name' => $request->name,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'img' => $name_img,
                'id_surveyor' => Auth::guard('surveyor')->user()->id
            ]);

            return \redirect('surveyor-dashboard')->with(['message' => 'Komoditas created successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function edit(Komoditas $komoditas)
    {
        if (Auth::guard('surveyor')->check()) {
            // $komoditas = Komoditas::find($id);
            // \dd($komoditas);
            return \view('surveyor.edit', \compact('komoditas'));
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function update(Request $request, Komoditas $komoditas)
    {
        if (Auth::guard('surveyor')->check()) {
            $this->validate($request, [
                'name' => 'required',
                'jenis' => 'required',
                'harga' => 'required'
            ]);

            $komoditas = Komoditas::find($komoditas->id);
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
                'id_surveyor' => Auth::guard('surveyor')->user()->id
            ]);
            return \redirect('surveyor-dashboard')->with(['message' => 'Komoditas updated successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }

    public function destroy(Komoditas $komoditas)
    {
        if (Auth::guard('surveyor')->check()) {
            Komoditas::destroy($komoditas->id);
            return \redirect()->back()->with(['message' => 'Game deleted successfully']);
        } else {
            return Redirect('login')->with('msg', 'Anda harus login'); //routing login
        }
    }
}
