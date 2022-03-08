<?php

namespace App\Http\Controllers;

use App\Models\DaftarPeriksa;
use App\Models\Pasien;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;


class DaftarPeriksaController extends Controller
{

    public function __construct()
    {
        $this->utilsModel = new Utils();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            "daftar_periksa" => DB::table('pasien')->select("id", "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap")->where("deleted_at","=",null)->latest()->get(),
            "dokter" => DB::table("sdm")->where('isDokter', "=",2)->where("deleted_at","=",null)->get(),
            "poli" => DB::table('poliklinik')->where("deleted_at","=",null)->get()
        ];

        if ($request->ajax()) {
            $data = $data["daftar_periksa"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action');
                    },0)
                 ->rawColumns(['action'])
                    ->make(true);
        }


        return view("daftar_periksa.index", $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDaftarPeriksa(Request $request)
    {
        $data = [
            "daftar_periksa" => DB::table('daftar_periksa')->select("daftar_periksa.id","daftar_periksa.id_pasien","daftar_periksa.waktu_daftar_periksa", "pasien.nama as nama_pasien", "pasien.nik", "pasien.norm", "poliklinik.nama as poli", "sdm.nama_sdm as nama_dokter",  "daftar_periksa.cara_bayar", "daftar_periksa.rujukan",  "daftar_periksa.penanggungjawab")->join("pasien","pasien.id","=", "daftar_periksa.id_pasien")->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")->where("daftar_periksa.deleted_at","=",null)->orderBy("daftar_periksa.id","DESC")->get(),
        ];

        // dd($data);

        if ($request->ajax()) {
            $data = $data["daftar_periksa"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_full');
                    }, 9)
                 ->rawColumns(['action'])
                    ->make(true);
        }


        return view("daftar_periksa.daftar_periksa", $data);
    }

    public function showDaftarPeriksa(Request $request, Int $id)
    {

        $data = [
            "daftar_periksa" => DB::table('daftar_periksa')->select("daftar_periksa.id","daftar_periksa.id_pasien","daftar_periksa.waktu_daftar_periksa", "pasien.nama as nama_pasien", "pasien.nik", "pasien.norm", "poliklinik.nama as poli", "sdm.nama_sdm as nama_dokter",  "daftar_periksa.cara_bayar", "daftar_periksa.rujukan",  "daftar_periksa.penanggungjawab")->join("pasien","pasien.id","=", "daftar_periksa.id_pasien")->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")->where("daftar_periksa.id_pasien","=",$id)->where("daftar_periksa.deleted_at","=",null)->orderBy("daftar_periksa.id","DESC")->get(),
        ];

        // dd(count($data["daftar_periksa"]));

        if ($request->ajax()) {
            $data = $data["daftar_periksa"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_soap_perawat');
                    }, 9)
                 ->rawColumns(['action'])
                    ->make(true);
        }


        // return view("daftar_periksa.daftar_periksa", $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar(Pasien $pasien)
    {

        $data = [
            "daftar_periksa" => DB::table('pasien')->select("id", "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap")->where("id","=",$pasien->id)->where("deleted_at","=",null)->latest()->first(),
            "dokter" => DB::table("sdm")->where('isDokter', "=",2)->where("deleted_at","=",null)->get(),
            "poli" => DB::table('poliklinik')->where("deleted_at","=",null)->get(),

        ];

        // dd($data);

        // dd($data);
        return view("daftar_periksa.create", $data);
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
            "no_antrian" =>$request->no_antrian,
            "waktu_daftar_periksa" =>$request->waktu_daftar_periksa,
            "rujukan" =>$request->rujukan,
            "id_pasien" =>$request->id_pasien,
            "id_poli" =>$request->id_poli,
            "id_dokter" =>$request->id_dokter,
            "cara_bayar" =>$request->cara_bayar,
            "penanggungjawab" =>$request->penanggungjawab,
        ];


        // dd($data);

        DB::table('daftar_periksa')->insert($data);


        return redirect()
                ->route('indexDaftarPeriksa');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarPeriksa  $daftar_periksa
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarPeriksa $daftar_periksa)
    {


        return view("daftar_periksa.show");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarPeriksa  $daftar_periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarPeriksa $daftar_periksa)
    {
        $data = [
            "daftar_periksa" => DB::table('daftar_periksa')->select("daftar_periksa.id","daftar_periksa.no_antrian","daftar_periksa.waktu_daftar_periksa", "pasien.nama as nama_pasien", "pasien.nik", "pasien.norm", "poliklinik.nama as poli", "sdm.nama_sdm as nama_dokter",  "daftar_periksa.cara_bayar", "daftar_periksa.rujukan",  "daftar_periksa.penanggungjawab", "daftar_periksa.id_pasien", "daftar_periksa.id_poli", "daftar_periksa.id_dokter",)->join("pasien","pasien.id","=", "daftar_periksa.id_pasien")->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")->where("daftar_periksa.id","=", $daftar_periksa->id)->where("daftar_periksa.deleted_at","=",null)->orderBy("daftar_periksa.id","DESC")->first(),
            "dokter" => DB::table("sdm")->where('isDokter', "=",2)->where("deleted_at","=",null)->get(),
            "poli" => DB::table('poliklinik')->where("deleted_at","=",null)->get(),

        ];


        return view('daftar_periksa.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarPeriksa  $daftar_periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarPeriksa $daftar_periksa)
    {
        $data = [
            "no_antrian" =>$request->no_antrian,
            "waktu_daftar_periksa" =>$request->waktu_daftar_periksa,
            "rujukan" =>$request->rujukan,
            "id_pasien" =>$request->id_pasien,
            "id_poli" =>$request->id_poli,
            "id_dokter" =>$request->id_dokter,
            "cara_bayar" =>$request->cara_bayar,
            "penanggungjawab" =>$request->penanggungjawab,
        ];



        // dd($data);

        // DB::table('daftar_periksa')->update($data);
        DB::table('daftar_periksa')->where("id",'=',$daftar_periksa->id)->update($data);


        return redirect()
                ->route('indexDaftarPeriksa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarPeriksa  $daftar_periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarPeriksa $daftar_periksa)
    {


        $delete = DaftarPeriksa::findOrFail($daftar_periksa->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('indexDaftarPeriksa')
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
