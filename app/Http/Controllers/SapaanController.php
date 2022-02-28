<?php

namespace App\Http\Controllers;

use App\Models\Sapaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SapaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "sapaan" => DB::table("sapaan")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("sapaan.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function sapaanFilter(Request $request)
    {
        $cari = [
            "sapaan" =>$request->sapaan == null ? "" : $request->sapaan,
        ];



        $cariData = DB::table("sapaan")->where("sapaan","LIKE", "%". $cari["sapaan"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "sapaan" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("sapaan.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("sapaan.create");
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
            "sapaan" =>$request->sapaan,
        ];

        // dd($data);

        DB::table('sapaan')->insert($data);


        return redirect()
                ->route('sapaan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sapaan  $sapaan
     * @return \Illuminate\Http\Response
     */
    public function show(Sapaan $sapaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sapaan  $sapaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Sapaan $sapaan)
    {
        $data = [
            "sapaan" => DB::table("sapaan")->where("id",'=', $sapaan->id)->first(),
        ];




        return view('sapaan.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sapaan  $sapaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sapaan $sapaan)
    {
        $data = [
            "sapaan" =>$request->sapaan,
        ];

        // dd($data);

        // DB::table('sapaan')->update($data);
        DB::table('sapaan')->where("id",'=',$sapaan->id)->update($data);


        return redirect()
                ->route('sapaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sapaan  $sapaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sapaan $sapaan)
    {


        $delete = Sapaan::findOrFail($sapaan->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('sapaan.index')
                ->with([
                    'success' => 'sapaan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('sapaan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
