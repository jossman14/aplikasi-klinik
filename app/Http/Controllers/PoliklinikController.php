<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "poliklinik" => DB::table("poliklinik")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("poliklinik.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function poliklinikFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("poliklinik")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "poliklinik" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("poliklinik.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("poliklinik.create");
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

        DB::table('poliklinik')->insert($data);


        return redirect()
                ->route('poliklinik.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function show(Poliklinik $poliklinik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function edit(Poliklinik $poliklinik)
    {
        $data = [
            "poliklinik" => DB::table("poliklinik")->where("id",'=', $poliklinik->id)->first(),
        ];




        return view('poliklinik.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poliklinik $poliklinik)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('poliklinik')->update($data);
        DB::table('poliklinik')->where("id",'=',$poliklinik->id)->update($data);


        return redirect()
                ->route('poliklinik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Poliklinik  $poliklinik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poliklinik $poliklinik)
    {


        $delete = Poliklinik::findOrFail($poliklinik->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('poliklinik.index')
                ->with([
                    'success' => 'poliklinik has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('poliklinik.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
