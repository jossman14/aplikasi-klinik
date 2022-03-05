<?php

namespace App\Http\Controllers;

use App\Models\StatusNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StatusNikahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "status_nikah" => DB::table("status_nikah")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("status_nikah.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function statusNikahFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("status_nikah")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "status_nikah" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("status_nikah.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("status_nikah.create");
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

        DB::table('status_nikah')->insert($data);


        return redirect()
                ->route('status_nikah.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusNikah  $status_nikah
     * @return \Illuminate\Http\Response
     */
    public function show(StatusNikah $status_nikah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusNikah  $status_nikah
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusNikah $status_nikah)
    {
        $data = [
            "status_nikah" => DB::table("status_nikah")->where("id",'=', $status_nikah->id)->first(),
        ];




        return view('status_nikah.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusNikah  $status_nikah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusNikah $status_nikah)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('status_nikah')->update($data);
        DB::table('status_nikah')->where("id",'=',$status_nikah->id)->update($data);


        return redirect()
                ->route('status_nikah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusNikah  $status_nikah
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusNikah $status_nikah)
    {


        $delete = StatusNikah::findOrFail($status_nikah->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('status_nikah.index')
                ->with([
                    'success' => 'status_nikah has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('status_nikah.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
