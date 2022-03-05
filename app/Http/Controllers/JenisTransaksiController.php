<?php

namespace App\Http\Controllers;

use App\Models\JenisTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "jenis_transaksi" => DB::table("jenis_transaksi")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("jenis_transaksi.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function jenisTransaksiFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("jenis_transaksi")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "jenis_transaksi" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("jenis_transaksi.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jenis_transaksi.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        DB::table('jenis_transaksi')->insert($data);


        return redirect()
                ->route('jenis_transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisTransaksi  $jenis_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(JenisTransaksi $jenis_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisTransaksi  $jenis_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisTransaksi $jenis_transaksi)
    {
        $data = [
            "jenis_transaksi" => DB::table("jenis_transaksi")->where("id",'=', $jenis_transaksi->id)->first(),
        ];




        return view('jenis_transaksi.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisTransaksi  $jenis_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTransaksi $jenis_transaksi)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('jenis_transaksi')->update($data);
        DB::table('jenis_transaksi')->where("id",'=',$jenis_transaksi->id)->update($data);


        return redirect()
                ->route('jenis_transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisTransaksi  $jenis_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTransaksi $jenis_transaksi)
    {


        $delete = JenisTransaksi::findOrFail($jenis_transaksi->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('jenis_transaksi.index')
                ->with([
                    'success' => 'jenis_transaksi has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('jenis_transaksi.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
