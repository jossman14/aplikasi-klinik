<?php

namespace App\Http\Controllers;

use App\Models\JenisTindakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisTindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "jenis_tindakan" => DB::table("jenis_tindakan")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("jenis_tindakan.index", $data);
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



        $cariData = DB::table("jenis_tindakan")->where("nama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "jenis_tindakan" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("jenis_tindakan.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jenis_tindakan.create");
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

        DB::table('jenis_tindakan')->insert($data);


        return redirect()
                ->route('jenis_tindakan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisTindakan  $jenis_tindakan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisTindakan $jenis_tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisTindakan  $jenis_tindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisTindakan $jenis_tindakan)
    {
        $data = [
            "jenis_tindakan" => DB::table("jenis_tindakan")->where("id",'=', $jenis_tindakan->id)->first(),
        ];




        return view('jenis_tindakan.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisTindakan  $jenis_tindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisTindakan $jenis_tindakan)
    {
        $data = [
            "nama" =>$request->nama,
        ];

        // dd($data);

        // DB::table('jenis_tindakan')->update($data);
        DB::table('jenis_tindakan')->where("id",'=',$jenis_tindakan->id)->update($data);


        return redirect()
                ->route('jenis_tindakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisTindakan  $jenis_tindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisTindakan $jenis_tindakan)
    {


        $delete = JenisTindakan::findOrFail($jenis_tindakan->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('jenis_tindakan.index')
                ->with([
                    'success' => 'jenis_tindakan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('jenis_tindakan.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
