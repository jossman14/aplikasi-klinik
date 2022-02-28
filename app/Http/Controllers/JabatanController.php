<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "jabatan" => DB::table("jabatan")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("jabatan.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function jabatanFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->jabatan == null ? "" : $request->jabatan,
        ];



        $cariData = DB::table("jabatan")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "jabatan" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("jabatan.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jabatan.create");
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
            "nama" =>$request->jabatan,
        ];

        // dd($data);

        DB::table('jabatan')->insert($data);


        return redirect()
                ->route('jabatan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jabatan $jabatan)
    {
        $data = [
            "jabatan" => DB::table("jabatan")->where("id",'=', $jabatan->id)->first(),
        ];




        return view('jabatan.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $data = [
            "nama" =>$request->jabatan,
        ];

        // dd($data);

        // DB::table('jabatan')->update($data);
        DB::table('jabatan')->where("id",'=',$jabatan->id)->update($data);


        return redirect()
                ->route('jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jabatan $jabatan)
    {


        $delete = Jabatan::findOrFail($jabatan->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('jabatan.index')
                ->with([
                    'success' => 'jabatan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('jabatan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
