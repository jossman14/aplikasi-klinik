<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{

    public function __construct()
    {
        $this->pasienModel = new Pasien();
        $this->utilsModel = new Utils();
    }

    /**
     * Display a listing of the resource.

     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "all_pasien" => $this->pasienModel->allData(),
            "jenis_kelamin" => $this->utilsModel->getJK(),
            "golongan_darah" => $this->utilsModel->getGolDar(),
            "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),

            "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),
            "keterangan" => "Tabel ini hanya menampilkan 10 data pasien dengan  total data ". "<span class='green white-text p-l-10 p-r-10'>" . DB::table("pasien")->where("deleted_at","=",null)->count() . "</span>". " dari awal mula
            data pasien ditambahkan ". "<span id='dateFormatAwal' class='green white-text p-l-10 p-r-10'>". DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg. "</span>" ." sampai waktu terakhir data pasien ditambahkan " . "<span id='dateFormatAkhir' class='green  white-text p-l-10 p-r-10'>". DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","desc")->first()->tgl_reg. "</span>",
        ];

        // dd(DB::table("pasien")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("pasien.index", $data);
    }
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function indexFilter(Request $request)
    {
        $cari = [
            "norm" =>$request->norm == null ? "" : $request->norm,
            "nama" =>$request->nama == null ? "" : $request->nama,
            "alamat_tetap" =>$request->alamat_tetap == null ? "" : $request->alamat_tetap,
            "desa_tetap_id" =>$request->desa_tetap_id == null ? "" : $request->desa_tetap_id,
            "kecamatan_tetap_id" =>$request->kecamatan_tetap_id == null ? "" : $request->kecamatan_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id == null ? "" : $request->kabupaten_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id == null ? "" : $request->kabupaten_tetap_id,
            "provinsi_tetap_id" =>$request->provinsi_tetap_id == null ? "" : $request->provinsi_tetap_id,
            "nik" =>$request->nik == null ? "" : $request->nik,
            "tgl_lahir" =>$request->tgl_lahir == null ? "" : $request->tgl_lahir,
            "jenis_kelamin" =>$request->jenis_kelamin == null ? "" : $request->jenis_kelamin,
            "umur" =>$request->umur == null ? "" : $request->umur,
            "gol_dar_id" =>$request->gol_dar_id == null ? "" : $request->gol_dar_id,
        ];

        // dd($cari['norm']);

        $cariData = $this->pasienModel->cariData($cari);

        $data = [
            "all_pasien" => $cariData,
            "filter_pencarian" => $cari,
            "jenis_kelamin" => $this->utilsModel->getJK(),
            "golongan_darah" => $this->utilsModel->getGolDar(),
            "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),

            "keterangan" => "Tabel menampilkan hasil pencarian " . count($cariData)." data dengan filter pencarian",
        ];

        // return redirect()
        //         ->route('pasien.index');


        return view("pasien.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id = $this->pasienModel->getLatestRM() == null ? 1 : $this->pasienModel->getLatestRM();
        // dd($id->id);
        // $norm=1;

        $data = [
            "id" => $id->id,
            "sapaan" => $this->utilsModel->getSapaan(),
            "jenis_kelamin" => $this->utilsModel->getJK(),
            "agama" => $this->utilsModel->getAgama(),
            "golongan_darah" => $this->utilsModel->getGolDar(),
            "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),


        ];

        return view("pasien.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cariKota(Request $request)
    {

        return $this->utilsModel->searchKota($request);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cariNik(Request $request)
    {

        return $this->utilsModel->searchNik($request);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchDiagnosa(Request $request)
    {

        return $this->utilsModel->searchDiagnosa($request);

    }

    public function searchTindakan(Request $request)
    {

        return $this->utilsModel->searchTindakan($request);

    }
    public function searchObat(Request $request)
    {

        return $this->utilsModel->searchObat($request);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cariDesa(Request $request)
    {

        return $this->utilsModel->searchDesa($request);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cariKecamatan(Request $request)
    {

        return $this->utilsModel->searchKecamatan($request);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cariProvinsi(Request $request)
    {

        return $this->utilsModel->searchProvinsi($request);

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
            "norm" =>$request->norm,
            "nama" =>$request->nama,
            "alamat_tetap" =>$request->alamat_tetap,
            "desa_tetap_id" =>$request->desa_tetap_id,
            "kecamatan_tetap_id" =>$request->kecamatan_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id,
            "provinsi_tetap_id" =>$request->provinsi_tetap_id,
            "nama_keluarga" =>$request->nama_keluarga,
            "nik" =>$request->nik,
            "tempat_lahir" =>$request->tempat_lahir,
            "tgl_lahir" =>$request->tgl_lahir,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "agamaId" =>$request->agama,
            "alamat_sementara" =>$request->alamat_sementara,
            "desa_smt_id" =>$request->desa_smt_id,
            "kecamatan_smt_id" =>$request->kecamatan_smt_id,
            "kecamatan_smt_id" =>$request->kecamatan_smt_id,
            "kabupaten_smt_id" =>$request->kabupaten_smt_id,
            "kabupaten_smt_id" =>$request->kabupaten_smt_id,
            "provinsi_smt_id" =>$request->provinsi_smt_id,
            "provinsi_smt_id" =>$request->provinsi_smt_id,
            "alamat_keluarga" =>$request->alamat_keluarga,
            "desa_klg_id" =>$request->desa_klg_id,
            "kecamatan_klg_id" =>$request->kecamatan_klg_id,
            "kabupaten_klg_id" =>$request->kabupaten_klg_id,
            "provinsi_klg_id" =>$request->provinsi_klg_id,
            "umur" =>$request->umur,
            "gol_dar_id" =>$request->gol_dar_id,
            "tgl_reg" =>date("Y-m-d"),
            "pekerjaan" =>$request->pekerjaan,
            "nomor_telepon" =>$request->nomor_telepon,
            "nomor_telepon_keluarga" =>$request->nomor_telepon_keluarga,
            "nomor_telepon_keluarga" =>$request->nomor_telepon_keluarga,
            "nomor_bpjs" =>$request->nomor_bpjs,
            "sapaan" =>$request->sapaan,
            "status_nikah" =>$request->status_nikah,
        ];

        // dd($data);

        $this->pasienModel->insertData($data);

        return redirect()
                ->route('pasien.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        // $singlePasien = $this->pasienModel->singleData($pasien->id);
        // $singlePasien = DB::table("pasien")->select("pasien.*", "status_nikah.nama as nama_status_nikah")->join("status_nikah", "status_nikah.id", "=", "pasien.status_nikah")->where("deleted_at","=" null)->get();

        $singlePasien = DB::table('pasien')->select("pasien.*","status_nikah.nama as nama_status_nikah")->join("status_nikah", "status_nikah.id", "=", "pasien.status_nikah")->where("pasien.id",'=',$pasien->id)->where("pasien.deleted_at","=",null)->first();

        // dd($singlePasien);

        $data = [
            "sapaan" => $this->utilsModel->getSapaan(),
            "jenis_kelamin" => DB::table('jenis_kelamin')->where("id","=",$singlePasien->jenis_kelamin)->select("jenis_kelamin")->first(),
            "agama" =>DB::table('agama')->where("agamaId","=", $singlePasien->agamaId)->select("agama")->first(),
            "golongan_darah" => DB::table('golongan_darah')->where("gol_dar_id","=", $singlePasien->gol_dar_id)->select("golongan_darah")->first(),
            "singlePasien" => $singlePasien,
            // "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),

            "tempat_lahir" => $this->utilsModel->searchKotaSingle($singlePasien->tempat_lahir),
            "kabupaten_tetap" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_tetap_id),
            "kecamatan_tetap" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_tetap_id),
            "desa_tetap" => $this->utilsModel->searchDesaSingle($singlePasien->desa_tetap_id),
            "provinsi_tetap" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_tetap_id),
            "kabupaten_smt" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_smt_id),
            "kecamatan_smt" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_smt_id),
            "desa_smt" => $this->utilsModel->searchDesaSingle($singlePasien->desa_smt_id),
            "provinsi_smt" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_smt_id),
            "kabupaten_klg" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_klg_id),
            "kecamatan_klg" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_klg_id),
            "desa_klg" => $this->utilsModel->searchDesaSingle($singlePasien->desa_klg_id),
            "provinsi_klg" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_klg_id),
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
            ->where("pasien.id", "=", $singlePasien->id)
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
            ->where("pasien.id", "=", $singlePasien->id)

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
            ->where("pasien.id", "=", $singlePasien->id)

            ->where("riwayat_obat.deleted_at","=",null)->get(),
        ];

        // dd($data);


        return view("pasien.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $id = $this->pasienModel->getLatestRM() == null ? 1 : $this->pasienModel->getLatestRM();
        $singlePasien =  $this->pasienModel->singleData($pasien->id);

        $data = [
            "id" => $id->id,
            "sapaan" => $this->utilsModel->getSapaan(),
            "jenis_kelamin" => $this->utilsModel->getJK(),
            "golongan_darah" => $this->utilsModel->getGolDar(),
            "status_nikah" => DB::table('status_nikah')->where("deleted_at","=",null)->get(),

            "agama" => $this->utilsModel->getAgama(),
            "singlePasien" => $singlePasien,
            "tempat_lahir" => $this->utilsModel->searchKotaSingle($singlePasien->tempat_lahir),
            "kabupaten_tetap" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_tetap_id),
            "kecamatan_tetap" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_tetap_id),
            "desa_tetap" => $this->utilsModel->searchDesaSingle($singlePasien->desa_tetap_id),
            "provinsi_tetap" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_tetap_id),
            "kabupaten_smt" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_smt_id),
            "kecamatan_smt" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_smt_id),
            "desa_smt" => $this->utilsModel->searchDesaSingle($singlePasien->desa_smt_id),
            "provinsi_smt" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_smt_id),
            "kabupaten_klg" => $this->utilsModel->searchKotaSingle($singlePasien->kabupaten_klg_id),
            "kecamatan_klg" => $this->utilsModel->searchKecamatanSingle($singlePasien->kecamatan_klg_id),
            "desa_klg" => $this->utilsModel->searchDesaSingle($singlePasien->desa_klg_id),
            "provinsi_klg" => $this->utilsModel->searchProvinsiSingle($singlePasien->provinsi_klg_id),
        ];



        // dd($data);
        return view("pasien.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {
        $data = [
            "norm" =>$request->norm,
            "nama" =>$request->nama,
            "alamat_tetap" =>$request->alamat_tetap,
            "desa_tetap_id" =>$request->desa_tetap_id,
            "kecamatan_tetap_id" =>$request->kecamatan_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id,
            "kabupaten_tetap_id" =>$request->kabupaten_tetap_id,
            "provinsi_tetap_id" =>$request->provinsi_tetap_id,
            "nama_keluarga" =>$request->nama_keluarga,
            "nik" =>$request->nik,
            "tempat_lahir" =>$request->tempat_lahir,
            "tgl_lahir" =>$request->tgl_lahir,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "jenis_kelamin" =>$request->jenis_kelamin,
            "agamaId" =>$request->agama,
            "alamat_sementara" =>$request->alamat_sementara,
            "desa_smt_id" =>$request->desa_smt_id,
            "kecamatan_smt_id" =>$request->kecamatan_smt_id,
            "kecamatan_smt_id" =>$request->kecamatan_smt_id,
            "kabupaten_smt_id" =>$request->kabupaten_smt_id,
            "kabupaten_smt_id" =>$request->kabupaten_smt_id,
            "provinsi_smt_id" =>$request->provinsi_smt_id,
            "provinsi_smt_id" =>$request->provinsi_smt_id,
            "alamat_keluarga" =>$request->alamat_keluarga,
            "desa_klg_id" =>$request->desa_klg_id,
            "kecamatan_klg_id" =>$request->kecamatan_klg_id,
            "kabupaten_klg_id" =>$request->kabupaten_klg_id,
            "provinsi_klg_id" =>$request->provinsi_klg_id,
            "umur" =>$request->umur,
            "gol_dar_id" =>$request->gol_dar_id,
            "tgl_reg" =>date("Y-m-d"),
            "pekerjaan" =>$request->pekerjaan,
            "nomor_telepon" =>$request->nomor_telepon,
            "nomor_telepon_keluarga" =>$request->nomor_telepon_keluarga,
            "nomor_telepon_keluarga" =>$request->nomor_telepon_keluarga,
            "nomor_bpjs" =>$request->nomor_bpjs,
            "sapaan" =>$request->sapaan,
            "status_nikah" =>$request->status_nikah,

        ];


        $update = $this->pasienModel->updateData($pasien->id, $data);


        return redirect()
                ->route('pasien.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        // $delete = $this->pasienModel->deleteData($pasien->id);
        $delete = Pasien::findOrFail($pasien->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'success' => 'pasien has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pasien.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
