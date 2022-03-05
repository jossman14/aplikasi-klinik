<?php

namespace App\Http\Controllers;

use App\Models\SatuanObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SatuanObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "satuan_obat" => DB::table("satuan_obat")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("satuan_obat.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function satuanObatFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("satuan_obat")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "satuan_obat" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("satuan_obat.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("satuan_obat.create");
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

        DB::table('satuan_obat')->insert($data);


        return redirect()
                ->route('satuan_obat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SatuanObat  $satuan_obat
     * @return \Illuminate\Http\Response
     */
    public function show(SatuanObat $satuan_obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SatuanObat  $satuan_obat
     * @return \Illuminate\Http\Response
     */
    public function edit(SatuanObat $satuan_obat)
    {
        $data = [
            "satuan_obat" => DB::table("satuan_obat")->where("id",'=', $satuan_obat->id)->first(),
        ];




        return view('satuan_obat.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SatuanObat  $satuan_obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SatuanObat $satuan_obat)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('satuan_obat')->update($data);
        DB::table('satuan_obat')->where("id",'=',$satuan_obat->id)->update($data);


        return redirect()
                ->route('satuan_obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SatuanObat  $satuan_obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SatuanObat $satuan_obat)
    {


        $delete = SatuanObat::findOrFail($satuan_obat->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('satuan_obat.index')
                ->with([
                    'success' => 'satuan_obat has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('satuan_obat.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
