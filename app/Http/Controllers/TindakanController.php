<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            "jenis_tindakan" => DB::table('tindakan')->select("tindakan.id","tindakan.nama",
            "jenis_tindakan.nama as nama_jenis_tindakan",
            "tindakan.harga_total",
            "tindakan.jasa_dokter",
            "tindakan.jasa_perawat",
            "tindakan.jasa_klinik",
            "tindakan.alat",
            "tindakan.bahan",
            "tindakan.lainnya", )->join("jenis_tindakan","jenis_tindakan.id","=","tindakan.jenis_tindakan")->where("tindakan.deleted_at","=",null)->orderBy("tindakan.id","desc")->get(),
        ];

        // dd($data);

        if ($request->ajax()) {
            $data = $data["jenis_tindakan"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_two');
                    },0)
                 ->rawColumns(['action'])
                    ->make(true);
        }


        return view("tindakan.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "jenis_tindakan" => DB::table("jenis_tindakan")->where("deleted_at","=",null)->get(),
        ];

        return view("tindakan.create", $data);
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
            "nama" => $request->nama,
            "jenis_tindakan" => $request->jenis_tindakan,
            "harga_total" => $request->harga_total,
            "jasa_dokter" => $request->jasa_dokter,
            "jasa_perawat" => $request->jasa_perawat,
            "jasa_klinik" => $request->jasa_klinik,
            "alat" => $request->alat,
            "bahan" => $request->bahan,
            "lainnya" => $request->lainnya,
        ];

        DB::table('tindakan')->insert($data);


        return redirect()
                ->route('tindakan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function show(Tindakan $tindakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tindakan $tindakan)
    {
        $data = [
            "tindakan" => DB::table("tindakan")->where("id","=",$tindakan->id)->first(),
            "jenis_tindakan" => DB::table("jenis_tindakan")->where("deleted_at","=",null)->get(),
        ];

        return view("tindakan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tindakan $tindakan)
    {
        $data = [
            "nama" => $request->nama,
            "jenis_tindakan" => $request->jenis_tindakan,
            "harga_total" => $request->harga_total,
            "jasa_dokter" => $request->jasa_dokter,
            "jasa_perawat" => $request->jasa_perawat,
            "jasa_klinik" => $request->jasa_klinik,
            "alat" => $request->alat,
            "bahan" => $request->bahan,
            "lainnya" => $request->lainnya,
        ];

        DB::table('tindakan')->where("id",'=',$tindakan->id)->update($data);


        return redirect()
                ->route('tindakan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tindakan  $tindakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tindakan $tindakan)
    {

        $delete = Tindakan::findOrFail($tindakan->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('tindakan.index')
                ->with([
                    'success' => 'daftar_periksa has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('indexDaftarPeriksa')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
