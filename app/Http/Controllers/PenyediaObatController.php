<?php

namespace App\Http\Controllers;

use App\Models\PenyediaObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PenyediaObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "penyedia_obat" => DB::table("penyedia_obat")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("penyedia_obat.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function penyediaObatFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("penyedia_obat")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "penyedia_obat" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("penyedia_obat.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("penyedia_obat.create");
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

        DB::table('penyedia_obat')->insert($data);


        return redirect()
                ->route('penyedia_obat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenyediaObat  $penyedia_obat
     * @return \Illuminate\Http\Response
     */
    public function show(PenyediaObat $penyedia_obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenyediaObat  $penyedia_obat
     * @return \Illuminate\Http\Response
     */
    public function edit(PenyediaObat $penyedia_obat)
    {
        $data = [
            "penyedia_obat" => DB::table("penyedia_obat")->where("id",'=', $penyedia_obat->id)->first(),
        ];




        return view('penyedia_obat.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenyediaObat  $penyedia_obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenyediaObat $penyedia_obat)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('penyedia_obat')->update($data);
        DB::table('penyedia_obat')->where("id",'=',$penyedia_obat->id)->update($data);


        return redirect()
                ->route('penyedia_obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenyediaObat  $penyedia_obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenyediaObat $penyedia_obat)
    {


        $delete = PenyediaObat::findOrFail($penyedia_obat->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('penyedia_obat.index')
                ->with([
                    'success' => 'penyedia_obat has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('penyedia_obat.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
