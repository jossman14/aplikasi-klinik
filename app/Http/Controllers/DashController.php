<?php

namespace App\Http\Controllers;

use App\Models\Dash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            "jumlahPasien" => DB::table("pasien")->where("deleted_at","=", null)->count(),
            "jumlahSdmPegawai" => DB::table("sdm")->where("isDokter","=", 1)->where("deleted_at","=", null)->count(),
            "jumlahSdmDokter" => DB::table("sdm")->where("isDokter","=", 2)->where("deleted_at","=", null)->count(),
            "obat_stats" => DB::table("obat_detail")->select("nama","stock")->where("deleted_at","=", null)->orderBy("stock","desc")->limit(5)->get(),
            "obat_stats_low" => DB::table("obat_detail")->select("nama","stock")->where("deleted_at","=", null)->orderBy("stock","asc")->limit(5)->get(),
            "user" => "User",
        ];
        return view("dash.index", $data);
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
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function show(Dash $dash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function edit(Dash $dash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dash $dash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dash  $dash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dash $dash)
    {
        //
    }
}
