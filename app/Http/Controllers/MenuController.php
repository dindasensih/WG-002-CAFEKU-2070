<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan data menu pada halaman menu.view
        $data = Menu::all();
        return view('menu.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //membuat data menu
        $data = Menu::all();
        $kategori = Kategori::all();
        return view('menu.create', compact('data', 'kategori'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data menu
        $file = $request->file('foto')->store('storage/artikel/foto');
        Menu::create([
            'nama' => $request->nama,
            'foto' => $file,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
            'kategori_id' => $request->kategori_id,

        ]);
         
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //mengubah data menu
        $data = Menu ::findOrFail($id);
        $kategori = Kategori::all();
        return view('menu.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //memperbarui data menu
        $data = Menu::find($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('storage/artikel/foto');
            $data->update([
                'nama' => $request->nama,
                'foto' => $file,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'kategori_id' => $request->kategori_id,
            ]);
        }else {
            $data->update([
                'nama' => $request->nama,
                'foto' => $data->foto,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
                'kategori_id' => $request->kategori_id,
            ]);
        }
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data menu
        $data = Menu::findOrfail($id);
        $data->delete();
        return redirect('menu');
    }

    public function menu()
    {
        //menampilkan menu pada halaman home
        $data = Menu::all();
        return view('home', compact('data'));
    }
}
