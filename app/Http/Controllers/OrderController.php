<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan form order pada halaman dashboard
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function order(Request $request)
    {
        //membuat variable jumlah orderan
        $jumlah = 0;
        if($request->pesanan != null){
            $pesanan = $request->pesanan;
            $jumlah = count($pesanan);
        }
        //menampilkan isi dari form
        $status = $request->status;
        $total = $jumlah * 50000;
        $pesan = new Pemesanan ($status, $total);
        $bayar = $pesan->bayar();
        $data = [
            'nama' => $request-> nama,
            'jumlah' => $jumlah,
            'total' => $total,
            'status' => $status,
            'diskon' => $pesan->diskon($status, $total),
            'total_order' => $bayar
        ];
        return view('dashboard', compact('data'));
    }
}
//membuat interface dengan method diskon
interface Pesanan{
    public function diskon();
}
//membuat class diskon
class diskon implements Pesanan{
    public $status;
    public $total;
    public function __construct($status,$total)
    {
        $this->status = $status;
        $this->total = $total;
    }
    public function diskon()
    {
        //membuat pengkondisian diskon untuk status member
        if($this->status == 'Member' && $this->total >=100000){
            return $this->total * 0.2;
        }elseif($this->status == 'Member' && $this->total < 100000){
            return $this->total * 0.1;
        }else{
            return $this->total * 0;
        }
    }
}
//membuat child class dari diskon
class Pemesanan extends Diskon{
    public function bayar()
    {
        return (int)$this->total - (int)$this->diskon($this->status,$this->total);
    }
}
