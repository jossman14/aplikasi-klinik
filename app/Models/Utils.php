<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Utils extends Model
{

    // TABEL PASIEN

    public function getSapaan(){
        $data = DB::table('sapaan')->get();
        return $data;
    }

    public function getKota(){
        $data = DB::table('regencies')->get();
        return $data;
    }

    public function getJK(){
        $data = DB::table('jenis_kelamin')->get();
        return $data;
    }

    public function getAgama(){
        $data = DB::table('agama')->get();
        return $data;
    }
    public function getGolDar(){
        $data = DB::table('golongan_darah')->get();
        return $data;
    }
    public function getKecamatan(){
        $data = DB::table('districts')->get();
        return $data;
    }
    public function getDesa(){
        $data = DB::table('villages')->get();
        return $data;
    }
    public function getProvinsi(){
        $data = DB::table('provinces')->get();
        return $data;
    }

    public function searchDiagnosa(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('icd10')->select('id','nama', "arti")->limit(10)->get();
        }else{
            $data = DB::table('icd10')
            ->where('nama','LIKE', '%' .$search . '%')
            ->orWhere('arti','LIKE', '%' .$search . '%')
            ->limit(10)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->nama . " " . $item->arti
           );
        }

        return response()->json($response);
     }

     public function searchTindakan(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('tindakan')->select('id','nama')->limit(10)->get();
        }else{
            $data = DB::table('tindakan')
            ->where('nama','LIKE', '%' .$search . '%')

            ->limit(10)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->nama
           );
        }

        return response()->json($response);
     }

     public function searchObat(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('obat_detail')->select('id','nama')->limit(10)->get();
        }else{
            $data = DB::table('obat_detail')
            ->where('nama','LIKE', '%' .$search . '%')

            ->limit(10)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->nama
           );
        }

        return response()->json($response);
     }

    public function searchKota(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('regencies')->select('id','name')->limit(5)->get();
        }else{
            $data = DB::table('regencies')->where('name','LIKE', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name
           );
        }

        return response()->json($response);
     }

     public function searchNik(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('pasien')->select("id", "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap")->where("deleted_at","=",null)->latest()->limit(10)->get();
        }else{
            $data = DB::table('pasien')->select("id", "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap")->where('nik','LIKE', '%' .$search . '%')->where("deleted_at","=",null)->latest()->limit(10)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "norm"=>$item->norm,
                "nama"=>$item->nama,
                "nik"=>$item->nik,
                "tgl_lahir"=>$item->tgl_lahir,
                "umur"=>$item->umur,
                "alamat_tetap"=>$item->alamat_tetap,
           );
        }



        return response()->json($response);
     }


    public function searchDesa(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('villages')->select('id','name')->limit(5)->get();
        }else{
            $data = DB::table('villages')->where('name','LIKE', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name
           );
        }

        return response()->json($response);
     }
    public function searchProvinsi(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('provinces')->select('id','name')->limit(5)->get();
        }else{
            $data = DB::table('provinces')->where('name','LIKE', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name
           );
        }

        return response()->json($response);
     }
    public function searchKecamatan(Request $request){

        $search = $request->search;

        if($search == ''){
           $data = DB::table('districts')->select('id','name')->limit(5)->get();
        }else{
            $data = DB::table('districts')->where('name','LIKE', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($data as $item){
           $response[] = array(
                "id"=>$item->id,
                "text"=>$item->name
           );
        }

        return response()->json($response);
     }
    public function searchKotaSingle(String $request){

        $search = $request;


        $data = DB::table('regencies')->where('id','=',$search)->first();


        return $data;
     }

    public function searchDesaSingle(String $request){

        $search = $request;


        $data = DB::table('villages')->where('id','=',$search)->first();


        return $data;
     }
    public function searchProvinsiSingle(String $request){

        $search = $request;


        $data = DB::table('provinces')->where('id','=',$search)->first();


        return $data;
     }
    public function searchKecamatanSingle(String $request){

        $search = $request;


        $data = DB::table('districts')->where('id','=',$search)->first();


        return $data;
     }

}
