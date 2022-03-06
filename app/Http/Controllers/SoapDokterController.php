<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\SoapDokter;
use Illuminate\Http\Request;

class SoapDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            "soap_dokter" => DB::table('soap_dokter')->select(
                "soap_dokter.id",
                "soap_dokter.id_daftar",

                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",

                "soap_dokter.anamnesa",

                "soap_dokter.planning",
                "soap_dokter.keluar",



            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")

            ->where("soap_dokter.deleted_at","=",null)->orderBy("soap_dokter.id","desc")->get(),
            "diagnosa" => DB::table("riwayat_diagnosa")->select(
                "icd10.nama",
                "icd10.arti",
                "soap_dokter.id",
                "soap_dokter.id_daftar",

                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",
                )
            ->join("icd10", "icd10.id", "=", "riwayat_diagnosa.id_diagnosa")
            ->join("soap_dokter","soap_dokter.id","=","riwayat_diagnosa.id_soap_dokter")
            ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("riwayat_diagnosa.deleted_at","=",null)->get(),
            "tindakan" => DB::table("riwayat_tindakan")
            ->select(
                "tindakan.nama",
                "soap_dokter.id",
                "riwayat_tindakan.id_daftar",
                "riwayat_tindakan.jumlah",

                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",
                )
                ->join("soap_dokter","soap_dokter.id","=","riwayat_tindakan.id_soap_dokter")
                ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
                ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
                ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
                ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->join("tindakan", "tindakan.id", "=", "riwayat_tindakan.id_tindakan")
            ->where("riwayat_tindakan.deleted_at","=",null)->get(),
            "obat" => DB::table("riwayat_obat")
            ->select(
                "obat_detail.nama",
                "soap_dokter.id",
                "riwayat_obat.id_daftar",
                "riwayat_obat.jumlah",

                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",
                )
            ->join("obat_detail", "obat_detail.id", "=", "riwayat_obat.id_obat")
            ->join("soap_dokter","soap_dokter.id","=","riwayat_obat.id_soap_dokter")
            ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("riwayat_obat.deleted_at","=",null)->get(),
        ];

        // dd($data);
        // dd($data["diagnosa"][0]->nama);

        if ($request->ajax()) {
            $data = $data;
            return Datatables::of($data['soap_dokter'])


                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_two');
                    },0)
                 ->rawColumns(['action'])



                    ->make(true);
        }


        return view("soap_dokter.index", $data);
    }
    public function showSoapDokter(Request $request, Int $id)
    {
        $data = [
            "soap_dokter" => DB::table('soap_dokter')->select(
                "soap_dokter.id",
                "soap_dokter.id_daftar",

                "daftar_periksa.waktu_daftar_periksa",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",

                "soap_dokter.anamnesa",

                "soap_dokter.planning",
                "soap_dokter.keluar",



            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("pasien.id","=", $id)
            ->where("soap_dokter.deleted_at","=",null)->orderBy("soap_dokter.id","desc")->get(),
        ];

        // dd($data["soap_dokter"]);

        if ($request->ajax()) {
            $data = $data["soap_dokter"];
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(){
                        return view('utils.action_two');
                    },0)
                 ->rawColumns(['action'])
                    ->make(true);
        }




        return view("soap_dokter.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "soap_dokter" => DB::table("soap_dokter")->where("deleted_at","=",null)->get(),
        ];

        return view("soap_dokter.create", $data);
    }

    public function createSoapDokter(Int $id, Int $id1)
    {

        // dd($id1);
        $data = [
            "soap_dokter" => DB::table('daftar_periksa')->select(
                "daftar_periksa.id",
                "daftar_periksa.waktu_daftar_periksa",
                "daftar_periksa.id_pasien",
                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",

            )
            // ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("daftar_periksa.id","=",$id1)
            ->where("daftar_periksa.id_pasien","=",$id)
            ->where("daftar_periksa.deleted_at","=",null)->orderBy("daftar_periksa.id","desc")->first(),
        ];

        // dd($data["soap_dokter"]);

        return view("soap_dokter.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $data = [



            "id_daftar" => $request->id_daftar,
            "anamnesa" => $request->anamnesa,
            "diagnosa" => $request->id_daftar,
            "tindakan" => $request->id_daftar,
            "obat" => $request->id_daftar,
            "planning" => $request->planning,
            "keluar" => $request->keluar,
        ];

        $idSoapDokter = DB::table('soap_dokter')->insertGetId($data);

        foreach($request->diagnosa as $key => $value) {
                DB::table('riwayat_diagnosa')->insert([
            "id_daftar" => $request->id_daftar,
            "id_soap_dokter" => $idSoapDokter,
            "id_diagnosa" => $value,

                ]);
        }

        foreach($request->tindakan as $key => $value) {
$harga = DB::table("tindakan")->select("harga_total")->where("id",'=',$value)->first();
$harga_akhir = $harga->harga_total * $request->jumlah_tindakan[$key];
DB::table("transaksi")->insert([
    "waktu_transaksi" => date('Y-m-d H:i:s'),
        "id_riwayat" => $value,
        "jumlah_transaksi" => $harga_akhir,
        "id_daftar" => $request->id_daftar,
        "jenis_transaksi" => 2,
]);

                DB::table('riwayat_tindakan')->insert([
            "id_daftar" => $request->id_daftar,
            "id_soap_dokter" => $idSoapDokter,
            "id_tindakan" => $value,
            "jumlah" => $request->jumlah_tindakan[$key],

                ]);
        }

        foreach($request->obat as $key => $value) {

            $harga = DB::table("obat_detail")->select("harga_jual")->where("id",'=',$value)->first();
$harga_akhir = $harga->harga_jual * $request->jumlah_obat[$key];
DB::table("transaksi")->insert([
    "waktu_transaksi" => date('Y-m-d H:i:s'),
        "id_riwayat" => $value,
        "jumlah_transaksi" => $harga_akhir,
        "id_daftar" => $request->id_daftar,
        "jenis_transaksi" => 1,
]);



            $singleObat = DB::table("obat_detail")->where("id","=",$value)->first();
            $singleObat->stock = $singleObat->stock - $request->jumlah_obat[$key];
            DB::table("obat_detail")->where("id","=",$value)->update([
                "stock" =>$singleObat->stock
            ]);



                DB::table('riwayat_obat')->insert([
            "id_daftar" => $request->id_daftar,
            "id_soap_dokter" => $idSoapDokter,
            "id_obat" => $value,
            "jumlah" => $request->jumlah_obat[$key],

                ]);
        }



        return redirect()
                ->route('pasien.show', $request->id_pasien);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SoapDokter  $soap_dokter
     * @return \Illuminate\Http\Response
     */
    public function show(SoapDokter $soap_dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SoapDokter  $soap_dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(SoapDokter $soap_dokter)
    {
        $data = [
            "soap_dokter" => DB::table('soap_dokter')->select(
            "soap_dokter.*", "daftar_periksa.waktu_daftar_periksa",
            "daftar_periksa.id_pasien", "pasien.nama as nama_pasien"
            )
            ->join("daftar_periksa","daftar_periksa.id","=","soap_dokter.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->where("soap_dokter.id","=",$soap_dokter->id)->where("soap_dokter.deleted_at","=",null)->orderBy("soap_dokter.id","DESC")->first(),
        ];

        // dd($data);
        return view("soap_dokter.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SoapDokter  $soap_dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoapDokter $soap_dokter)
    {
        $data = [
            "id_daftar" => $request->id_daftar,
        "anamnesa" => $request->anamnesa,
        "systolic" => $request->systolic,
        "diastolic" => $request->diastolic,
        "nadi" => $request->nadi,
        "suhu" => $request->suhu,
        "pernafasan" => $request->pernafasan,
        "tinggi" => $request->tinggi,
        "berat" => $request->berat,
        "lila" => $request->lila,
        "no_file_tracer" => "",
        ];

        DB::table('soap_dokter')->where("id",'=',$soap_dokter->id)->update($data);


        return redirect()
                ->route('soap_dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SoapDokter  $soap_dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoapDokter $soap_dokter)
    {

        $delete = SoapDokter::findOrFail($soap_dokter->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('soap_dokter.index')
                ->with([
                    'success' => 'soap_dokter has been deleted successfully'
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
