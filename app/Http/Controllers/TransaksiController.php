<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            "transaksi_tindakan" => DB::table('transaksi')
            ->select(
                "transaksi.waktu_transaksi",

                "transaksi.jumlah_transaksi",

                "riwayat_tindakan.jumlah as jumlah_tindakan",
                "tindakan.nama as nama_tindakan",



                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",

            )
            // ->where("transaksi.jenis_transaksi","=",2)
            ->join("riwayat_tindakan","riwayat_tindakan.id_tindakan","=","transaksi.id_riwayat")
            ->join("tindakan","tindakan.id","=","riwayat_tindakan.id_tindakan")
            ->join("daftar_periksa","daftar_periksa.id","=","transaksi.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("transaksi.jenis_transaksi","=",2)

            ->where("transaksi.deleted_at","=",null)->orderBy("transaksi.id","desc")->get(),

            "transaksi_obat" => DB::table('transaksi')
            ->select(
                "transaksi.waktu_transaksi",

                "transaksi.jumlah_transaksi",

                "riwayat_obat.jumlah as jumlah_obat",
                "obat_detail.nama as nama_obat",



                "pasien.nama as nama_pasien",
                "poliklinik.nama as nama_poliklinik",
                "sdm.nama_sdm as nama_dokter",

            )
            ->join("riwayat_obat","riwayat_obat.id_obat","=","transaksi.id_riwayat")
            ->join("obat_detail","obat_detail.id","=","riwayat_obat.id_obat")
            ->join("daftar_periksa","daftar_periksa.id","=","transaksi.id_daftar")
            ->join("pasien","pasien.id","=","daftar_periksa.id_pasien")
            ->join("sdm","sdm.sdm_id","=", "daftar_periksa.id_dokter")
            ->join("poliklinik","poliklinik.id","=", "daftar_periksa.id_poli")
            ->where("transaksi.jenis_transaksi","=",1)
            ->where("transaksi.deleted_at","=",null)->orderBy("transaksi.id","desc")->get(),

        ];

        // dd($data);



        return view("transaksi.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "jenis_transaksi" => DB::table("jenis_transaksi")->where("deleted_at","=",null)->get(),
        ];

        return view("transaksi.create", $data);
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
            "waktu_transaksi" => $request->waktu_transaksi,
        "id_riwayat_tindakan" => $request->id_riwayat_tindakan,
        "id_riwayat_obat" => $request->id_riwayat_obat,
        "jumlah_transaksi" => $request->jumlah_transaksi,
        "id_daftar" => $request->id_daftar,
        ];

        DB::table('transaksi')->insert($data);


        return redirect()
                ->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $data = [
            "transaksi" => DB::table("transaksi")->where("id","=",$transaksi->id)->first(),
            "jenis_transaksi" => DB::table("jenis_transaksi")->where("deleted_at","=",null)->get(),
        ];

        return view("transaksi.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $data = [
            "waktu_transaksi" => $request->waktu_transaksi,
        "id_riwayat_tindakan" => $request->id_riwayat_tindakan,
        "id_riwayat_obat" => $request->id_riwayat_obat,
        "jumlah_transaksi" => $request->jumlah_transaksi,
        "id_daftar" => $request->id_daftar,
        ];

        DB::table('transaksi')->where("id",'=',$transaksi->id)->update($data);


        return redirect()
                ->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {

        $delete = Transaksi::findOrFail($transaksi->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('transaksi.index')
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
