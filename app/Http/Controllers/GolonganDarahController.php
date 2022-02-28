<?php

namespace App\Http\Controllers;

use App\Models\GolonganDarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GolonganDarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "golongan_darah" => DB::table("golongan_darah")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("golongan_darah.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function golonganDarahFilter(Request $request)
    {
        $cari = [
            "golongan_darah" =>$request->golongan_darah == null ? "" : $request->golongan_darah,
        ];



        $cariData = DB::table("golongan_darah")->where("golongan_darah","LIKE", "%". $cari["golongan_darah"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "golongan_darah" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("golongan_darah.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("golongan_darah.create");
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
            "golongan_darah" =>$request->golongan_darah,
        ];

        // dd($data);

        DB::table('golongan_darah')->insert($data);


        return redirect()
                ->route('golongan_darah.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GolonganDarah  $golongan_darah
     * @return \Illuminate\Http\Response
     */
    public function show(GolonganDarah $golongan_darah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GolonganDarah  $golongan_darah
     * @return \Illuminate\Http\Response
     */
    public function edit(GolonganDarah $golongan_darah)
    {
        $data = [
            "golongan_darah" => DB::table("golongan_darah")->where("gol_dar_id",'=', $golongan_darah->gol_dar_id)->first(),
        ];




        return view('golongan_darah.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GolonganDarah  $golongan_darah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GolonganDarah $golongan_darah)
    {
        $data = [
            "golongan_darah" =>$request->golongan_darah,
        ];

        // dd($data);

        // DB::table('golongan_darah')->update($data);
        DB::table('golongan_darah')->where("gol_dar_id",'=',$golongan_darah->gol_dar_id)->update($data);


        return redirect()
                ->route('golongan_darah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GolonganDarah  $golongan_darah
     * @return \Illuminate\Http\Response
     */
    public function destroy(GolonganDarah $golongan_darah)
    {


        $delete = GolonganDarah::findOrFail($golongan_darah->gol_dar_id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('golongan_darah.index')
                ->with([
                    'success' => 'golongan_darah has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('golongan_darah.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
