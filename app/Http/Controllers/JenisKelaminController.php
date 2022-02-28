<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("jenis_kelamin.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function jenisKelaminFilter(Request $request)
    {
        $cari = [
            "jenis_kelamin" =>$request->jenis_kelamin == null ? "" : $request->jenis_kelamin,
        ];



        $cariData = DB::table("jenis_kelamin")->where("jenis_kelamin","LIKE", "%". $cari["jenis_kelamin"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "jenis_kelamin" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("jenis_kelamin.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jenis_kelamin.create");
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
            "jenis_kelamin" =>$request->jenis_kelamin,
        ];

        // dd($data);

        DB::table('jenis_kelamin')->insert($data);


        return redirect()
                ->route('jenis_kelamin.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKelamin  $jenis_kelamin
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKelamin $jenis_kelamin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKelamin  $jenis_kelamin
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKelamin $jenis_kelamin)
    {
        $data = [
            "jenis_kelamin" => DB::table("jenis_kelamin")->where("id",'=', $jenis_kelamin->id)->first(),
        ];




        return view('jenis_kelamin.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKelamin  $jenis_kelamin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKelamin $jenis_kelamin)
    {
        $data = [
            "jenis_kelamin" =>$request->jenis_kelamin,
        ];

        // dd($data);

        // DB::table('jenis_kelamin')->update($data);
        DB::table('jenis_kelamin')->where("id",'=',$jenis_kelamin->id)->update($data);


        return redirect()
                ->route('jenis_kelamin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKelamin  $jenis_kelamin
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKelamin $jenis_kelamin)
    {


        $delete = JenisKelamin::findOrFail($jenis_kelamin->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('jenis_kelamin.index')
                ->with([
                    'success' => 'jenis_kelamin has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('jenis_kelamin.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
