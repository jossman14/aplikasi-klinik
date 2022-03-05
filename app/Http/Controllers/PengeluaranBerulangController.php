<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranBerulang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PengeluaranBerulangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "pengeluaran_berulang" => DB::table("pengeluaran_berulang")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("pengeluaran_berulang.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function pengeluaranBerulangFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("pengeluaran_berulang")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "pengeluaran_berulang" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("pengeluaran_berulang.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pengeluaran_berulang.create");
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

        DB::table('pengeluaran_berulang')->insert($data);


        return redirect()
                ->route('pengeluaran_berulang.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengeluaranBerulang  $pengeluaran_berulang
     * @return \Illuminate\Http\Response
     */
    public function show(PengeluaranBerulang $pengeluaran_berulang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengeluaranBerulang  $pengeluaran_berulang
     * @return \Illuminate\Http\Response
     */
    public function edit(PengeluaranBerulang $pengeluaran_berulang)
    {
        $data = [
            "pengeluaran_berulang" => DB::table("pengeluaran_berulang")->where("id",'=', $pengeluaran_berulang->id)->first(),
        ];




        return view('pengeluaran_berulang.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengeluaranBerulang  $pengeluaran_berulang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengeluaranBerulang $pengeluaran_berulang)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('pengeluaran_berulang')->update($data);
        DB::table('pengeluaran_berulang')->where("id",'=',$pengeluaran_berulang->id)->update($data);


        return redirect()
                ->route('pengeluaran_berulang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengeluaranBerulang  $pengeluaran_berulang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengeluaranBerulang $pengeluaran_berulang)
    {


        $delete = PengeluaranBerulang::findOrFail($pengeluaran_berulang->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('pengeluaran_berulang.index')
                ->with([
                    'success' => 'pengeluaran_berulang has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pengeluaran_berulang.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
