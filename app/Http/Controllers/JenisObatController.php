<?php

namespace App\Http\Controllers;

use App\Models\JenisObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "jenis_obat" => DB::table("jenis_obat")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("jenis_obat.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function jenisObatFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("jenis_obat")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "jenis_obat" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("jenis_obat.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jenis_obat.create");
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

        DB::table('jenis_obat')->insert($data);


        return redirect()
                ->route('jenis_obat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenis_obat
     * @return \Illuminate\Http\Response
     */
    public function show(JenisObat $jenis_obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisObat  $jenis_obat
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisObat $jenis_obat)
    {
        $data = [
            "jenis_obat" => DB::table("jenis_obat")->where("id",'=', $jenis_obat->id)->first(),
        ];




        return view('jenis_obat.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisObat  $jenis_obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisObat $jenis_obat)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('jenis_obat')->update($data);
        DB::table('jenis_obat')->where("id",'=',$jenis_obat->id)->update($data);


        return redirect()
                ->route('jenis_obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisObat  $jenis_obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisObat $jenis_obat)
    {


        $delete = JenisObat::findOrFail($jenis_obat->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('jenis_obat.index')
                ->with([
                    'success' => 'jenis_obat has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('jenis_obat.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
