<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "agama" => DB::table("agama")->where("deleted_at","=",null)->get(),
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("agama.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function agamaFilter(Request $request)
    {
        $cari = [
            "nama" =>$request->nama == null ? "" : $request->nama,
        ];



        $cariData = DB::table("agama")->where("agama","LIKE", "%". $cari["nama"]."%")->where("deleted_at","=",null)->get();

        $data = [
            "agama" => $cariData,
            "filter_pencarian" => $cari,
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("agama.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("agama.create");
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
            "agama" =>$request->agama,
        ];

        // dd($data);

        DB::table('agama')->insert($data);


        return redirect()
                ->route('agama.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(Agama $agama)
    {
        $data = [
            "agama" => DB::table("agama")->where("agamaId",'=', $agama->agamaId)->first(),
        ];




        return view('agama.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agama $agama)
    {
        $data = [
            "agama" =>$request->agama,
        ];

        // dd($data);

        // DB::table('agama')->update($data);
        DB::table('agama')->where("agamaId",'=',$agama->agamaId)->update($data);


        return redirect()
                ->route('agama.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agama $agama)
    {


        $delete = Agama::findOrFail($agama->agamaId);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('agama.index')
                ->with([
                    'success' => 'agama has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('agama.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
