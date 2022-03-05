<?php

namespace App\Http\Controllers;

use App\Models\ObatDetail;
use App\Models\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ObatDetailController extends Controller
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
    public function index()
    {
        $data = [
            "obat_detail" => DB::table('obat_detail')->select("obat_detail.id", "obat_detail.nama", "obat_detail.jenis_obat", "obat_detail.stock", "obat_detail.expire", "jenis_obat.id as id_jenis_obat", "jenis_obat.nama as nama_jenis_obat")->join("jenis_obat", "jenis_obat.id", "=", "obat_detail.jenis_obat")->where("obat_detail.deleted_at","=",null)->orderBy("obat_detail.id","desc")->limit(10)->get(),
            "jenis_obat" => DB::table("jenis_obat")->where("deleted_at","=",null)->get(),
            "satuan_obat" => DB::table("satuan_obat")->where("deleted_at","=",null)->get(),
            "penyedia_obat" => DB::table("penyedia_obat")->where("deleted_at","=",null)->get(),
            "keterangan" => "Tabel ini hanya menampilkan 10 data Obat dengan  total data ". "<span class='green white-text p-l-10 p-r-10'>" . DB::table("obat_detail")->where("deleted_at","=",null)->count() . "</span>",
        ];

        // dd(DB::table('obat_detail')->get());



        // dd(DB::table("obat_detail")->select("tgl_reg")->orderBy("tgl_reg","asc")->first()->tgl_reg);


        return view("obat_detail.index", $data);
    }

        /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function obatDetailFilter(Request $request)
    {

        // dd($request->expi);

        $cari = [

            "nama" =>$request->nama == null ? "" : $request->nama,
            "satuan" =>$request->satuan == null ? "" : $request->satuan,
            "jenis_obat" =>$request->jenis_obat == null ? "" : $request->jenis_obat,
            "penyedia_obat" =>$request->penyedia_obat == null ? "" : $request->penyedia_obat,

            "stok_bawah" =>$request->stok_bawah == null ? "" : $request->stok_bawah,
            "stok_atas" =>$request->stok_atas == null ? "" : $request->stok_atas,
            "tgl_beli_bawah" => $request->tgl_beli_bawah == null ? "" : $request->tgl_beli_bawah,
            "tgl_beli_atas" => $request->tgl_beli_atas == null ? "" : $request->tgl_beli_atas,
            "expire_bawah" => $request->expire_bawah == null ? "" : $request->expire_bawah,
            "expire_atas" => $request->expire_atas == null ? "" : $request->expire_atas,


        ];



        // $cariData = DB::table("obat_detail")->where("obat_detail","LIKE", "%". $cari["obat_detail"]."%")->where("deleted_at","=",null)->get()
        // $cariData = DB::table('obat_detail')->select("obat_detail.id", "obat_detail.nama", "obat_detail.jenis_obat", "obat_detail.stock", "obat_detail.expire", "jenis_obat.id as id_jenis_obat", "jenis_obat.nama as nama_jenis_obat")->join("jenis_obat", "jenis_obat.id", "=", "obat_detail.jenis_obat")->where([
        //     ["obat_detail.nama", "LIKE", "%".$cari["nama"]."%"],
        //     ["obat_detail.satuan", "LIKE", "%".$cari["satuan"]."%"],
        //     ["obat_detail.jenis_obat", "LIKE", "%".$cari["jenis_obat"]."%"],
        //     ["obat_detail.penyedia_obat", "LIKE", "%".$cari["penyedia_obat"]."%"],
        // ])->where("obat_detail.deleted_at","=",null)->orderBy("obat_detail.id","desc")->get();


        $cariData = DB::table('obat_detail')->select("obat_detail.id", "obat_detail.nama", "obat_detail.jenis_obat", "obat_detail.stock", "obat_detail.expire", "jenis_obat.id as id_jenis_obat", "jenis_obat.nama as nama_jenis_obat")->join("jenis_obat", "jenis_obat.id", "=", "obat_detail.jenis_obat")->where([
            ["obat_detail.nama", "LIKE", "%".$cari["nama"]."%"],
            ["obat_detail.satuan", "LIKE", "%".$cari["satuan"]."%"],
            ["obat_detail.jenis_obat", "LIKE", "%".$cari["jenis_obat"]."%"],
            ["obat_detail.penyedia_obat", "LIKE", "%".$cari["penyedia_obat"]."%"],


        ]);

        if ($cari["stok_bawah"] != "") {
            $cariData = $cariData->where("obat_detail.stock", ">", $cari["stok_bawah"]);
        } elseif ($cari["stok_atas"] != "") {
            $cariData = $cariData->where("obat_detail.stock", "<", $cari["stok_atas"]);
        } elseif ($cari["tgl_beli_bawah"] != "") {
            $cariData = $cariData->where("obat_detail.tgl_beli", ">", $cari["tgl_beli_bawah"]);
        } elseif ($cari["tgl_beli_atas"] != "") {
            $cariData = $cariData->where("obat_detail.tgl_beli", "<", $cari["tgl_beli_atas"]);
        } elseif ($cari["expire_bawah"] != "") {
            $cariData = $cariData->where("obat_detail.expire", ">", $cari["expire_bawah"]);
        } elseif ($cari["expire_atas"] != "") {
            $cariData = $cariData->where("obat_detail.expire", "<", $cari["expire_atas"]);
        }

        $cariData = $cariData->where("obat_detail.deleted_at","=",null)->orderBy("obat_detail.id","desc")->get();


        // dd($cariData);


        $data = [
            "obat_detail" => $cariData,
            "filter_pencarian" => $cari,
            "jenis_obat" => DB::table("jenis_obat")->where("deleted_at","=",null)->get(),
            "satuan_obat" => DB::table("satuan_obat")->where("deleted_at","=",null)->get(),
            "penyedia_obat" => DB::table("penyedia_obat")->where("deleted_at","=",null)->get(),
            "keterangan" => "Tabel menampilkan hasil pencarian " . count($cariData)." data dengan filter pencarian",
        ];

        // return redirect()
        //         ->route('obat_detail.index');


        return view("obat_detail.index", $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            "jenis_obat" => DB::table("jenis_obat")->where("deleted_at","=",null)->get(),
            "satuan_obat" => DB::table("satuan_obat")->where("deleted_at","=",null)->get(),
            "penyedia_obat" => DB::table("penyedia_obat")->where("deleted_at","=",null)->get(),
        ];

        return view("obat_detail.create", $data);
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
            "satuan" => $request->satuan,
            "jenis_obat" => $request->jenis_obat,
            "min_stock" => $request->min_stock,
            "max_stock" => $request->max_stock,
            "stock" => $request->stock,
            "tgl_beli" => $request->tgl_beli,
            "expire" => $request->expire,
            "batch" => $request->batch,
            "penyedia_obat" => $request->penyedia_obat,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
        ];


        // dd($data);

        DB::table('obat_detail')->insert($data);


        return redirect()
                ->route('obat_detail.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ObatDetail  $obat_detail
     * @return \Illuminate\Http\Response
     */
    public function show(ObatDetail $obat_detail)
    {
        // "nama" ,"satuan" ,"jenis_obat" ,"min_stock" ,"max_stock", "stock" ,"tgl_beli" ,"expire" ,"batch" ,"penyedia_obat" ,"harga_beli" ,"harga_jual"

        $singleObatDetail = DB::table('obat_detail')->select("obat_detail.id", "obat_detail.nama", "obat_detail.min_stock", "obat_detail.max_stock", "obat_detail.stock", "obat_detail.tgl_beli", "obat_detail.expire", "obat_detail.batch", "obat_detail.harga_beli","obat_detail.harga_jual", "jenis_obat.nama as nama_jenis_obat", "satuan_obat.nama as nama_satuan_obat", "penyedia_obat.nama as nama_penyedia_obat" );

        $singleObatDetail = $singleObatDetail->join("jenis_obat", "jenis_obat.id", "=", "obat_detail.jenis_obat");
        $singleObatDetail = $singleObatDetail->join("satuan_obat", "satuan_obat.id", "=", "obat_detail.satuan");
        $singleObatDetail = $singleObatDetail->join("penyedia_obat", "penyedia_obat.id", "=", "obat_detail.penyedia_obat");

        $singleObatDetail = $singleObatDetail->where("obat_detail.id","=",$obat_detail->id);
        $singleObatDetail = $singleObatDetail->where("obat_detail.deleted_at","=",null)->orderBy("obat_detail.id","desc")->first();

        // dd($singleObatDetail);
        $data = [
            "singleObatDetail" => $singleObatDetail,
        ];

        return view("obat_detail.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ObatDetail  $obat_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(ObatDetail $obat_detail)
    {
        $singleObatDetail = DB::table("obat_detail")->where("id",'=', $obat_detail->id)->first();
        $data = [
            "singleObatDetail" => $singleObatDetail,
            "jenis_obat" => DB::table("jenis_obat")->where("deleted_at","=",null)->get(),
            "satuan_obat" => DB::table("satuan_obat")->where("deleted_at","=",null)->get(),
            "penyedia_obat" => DB::table("penyedia_obat")->where("deleted_at","=",null)->get(),
        ];

        return view('obat_detail.edit', $data);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ObatDetail  $obat_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObatDetail $obat_detail)
    {
        $data = [
            "nama" => $request->nama,
            "satuan" => $request->satuan,
            "jenis_obat" => $request->jenis_obat,
            "min_stock" => $request->min_stock,
            "max_stock" => $request->max_stock,
            "stock" => $request->stock,
            "tgl_beli" => $request->tgl_beli,
            "expire" => $request->expire,
            "batch" => $request->batch,
            "penyedia_obat" => $request->penyedia_obat,
            "harga_beli" => $request->harga_beli,
            "harga_jual" => $request->harga_jual,
        ];

        // dd($data);

        // DB::table('obat_detail')->update($data);
        DB::table('obat_detail')->where("id",'=',$obat_detail->id)->update($data);


        return redirect()
                ->route('obat_detail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ObatDetail  $obat_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObatDetail $obat_detail)
    {


        $delete = ObatDetail::findOrFail($obat_detail->id);
        $delete->delete();

        if ($delete) {
            return redirect()
                ->route('obat_detail.index')
                ->with([
                    'success' => 'obat_detail has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('obat_detail.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
