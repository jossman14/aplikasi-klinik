<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // $provinces =  DB::table('pasien')->get();

        // $provinces =  DB::table('provinces')->get();
        $provinces =  DB::table('provinces')->pluck("id")->toArray();
        $regencies =  DB::table('regencies')->pluck("id")->toArray();
        $districts =  DB::table('districts')->pluck("id")->toArray();
        $villages =  DB::table('villages')->pluck("id")->toArray();
        $sapaan =  DB::table('sapaan')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $agama =  DB::table('agama')->where("deleted_at", '=', null)->pluck("agamaId")->toArray();
        $jenis_tindakan =  DB::table('jenis_tindakan')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $golongan_darah =  DB::table('golongan_darah')->where("deleted_at", '=', null)->pluck("gol_dar_id")->toArray();
        $jenis_kelamin =  DB::table('jenis_kelamin')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $jabatan_pegawai =  DB::table('jabatan')->where("nama","LIKE","%Pegawai%")->where("deleted_at", '=', null)->pluck("id")->toArray();
        $jabatan_dokter =  DB::table('jabatan')->where("nama","LIKE","%Dokter%")->where("deleted_at", '=', null)->pluck("id")->toArray();

        $penyedia_obat =  DB::table('penyedia_obat')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $jenis_obat =  DB::table('jenis_obat')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $satuan_obat =  DB::table('satuan_obat')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $status_nikah =  DB::table('status_nikah')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $pasien =  DB::table('pasien')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $poliklinik =  DB::table('poliklinik')->where("deleted_at", '=', null)->pluck("id")->toArray();
        $dokter =  DB::table('sdm')->where('isDokter', "=",2)->where("deleted_at", '=', null)->pluck("sdm_id")->toArray();

        // die;
        // dd($poliklinik);


    	for($i = 1; $i <= 1000; $i++){
        // DB::table('pasien')->insert([
        //     'nama' => $faker->name,
        //     'alamat_tetap' => $faker->address,
        //     'desa_tetap_id' => $faker->randomElement($array = $villages),
        //     'kecamatan_tetap_id' => $faker->randomElement($array = $districts),
        //     'kabupaten_tetap_id' => $faker->randomElement($array = $regencies),
        //     'provinsi_tetap_id' => $faker->randomElement($array = $provinces),
        //     'nama_keluarga' => $faker->name,
        //     'nik' => $faker->nik(),
        //     'tempat_lahir' => $faker->randomElement($array = $regencies),
        //     'tgl_lahir' => $faker->dateTimeBetween($startDate = '-80 years', $endDate = 'now', $timezone = null),
        //     'jenis_kelamin' => $faker->randomElement($array = $jenis_kelamin),
        //     'agamaId' => $faker->randomElement($array = $agama),
        //     'alamat_sementara' => $faker->address,
        //     'desa_smt_id' => $faker->randomElement($array = $villages),
        //     'kecamatan_smt_id' => $faker->randomElement($array = $districts),
        //     'kabupaten_smt_id' => $faker->randomElement($array = $regencies),
        //     'provinsi_smt_id' => $faker->randomElement($array = $provinces),
        //     'alamat_keluarga' => $faker->address,
        //     'desa_klg_id' => $faker->randomElement($array = $villages),
        //     'kecamatan_klg_id' => $faker->randomElement($array = $districts),
        //     'kabupaten_klg_id' => $faker->randomElement($array = $regencies),
        //     'status_nikah' => $faker->randomElement($array = $status_nikah),
        //     'provinsi_klg_id' => $faker->randomElement($array = $provinces),
        //     'umur' => $faker->numberBetween($min = 1, $max = 80),
        //     'gol_dar_id' => $faker->randomElement($array = $golongan_darah),
        //     'tgl_reg' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        //     'pekerjaan' => $faker->jobTitle,
        //     'nomor_telepon' => $faker->e164PhoneNumber,
        //     'nomor_telepon_keluarga' => $faker->e164PhoneNumber,
        //     'nomor_bpjs' => $faker->nik(),
        //     'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        //     'updated_at' => null,
        //     'deleted_at' => null,
        //     'sapaan' =>$faker->randomElement($array = $sapaan),
        //     'norm' =>$faker->numerify('RM#####')

        // DB::table("sdm")->insert([
        //     "nama_sdm" =>$faker->name,
        //     "alamat_sdm" =>$faker->address,
        //     "desa_sdm_id" =>$faker->randomElement($array = $villages),
        //     "kecamatan_sdm_id" =>$faker->randomElement($array = $districts),
        //     "kabupaten_sdm_id" =>$faker->randomElement($array = $regencies),
        //     "provinsi_sdm_id" =>$faker->randomElement($array = $provinces),
        //     "nik" =>$faker->nik(),
        //     "nomor_hp" =>$faker->e164PhoneNumber,
        //     // "jobdesk" =>$faker->randomElement($array = $jabatan_pegawai),
        //     "jobdesk" =>$faker->randomElement($array = $jabatan_dokter),
        //     "tgl_lahir" =>$faker->dateTimeBetween($startDate = '-80 years', $endDate = 'now', $timezone = null),
        //     "umur" =>$faker->numberBetween($min = 1, $max = 80),
        //     "gol_darah_id" =>$faker->randomElement($array = $golongan_darah),
        //     "agama_id" =>$faker->randomElement($array = $agama),
        //     "isDokter" =>2,
        //     "jenis_kelamin" =>$faker->randomElement($array = $jenis_kelamin),
        //     // "isDokter" =>$request->isDokter,
        // ]);



        //     $max_obat = $faker->numberBetween($min = 10, $max = 1000);
        //     $max_harga = $faker->numberBetween($min = 10, $max = 1000000);
        // DB::table("obat_detail")->insert([
        //     "nama" =>$faker->numerify('Obat ###'),
        //     "satuan" =>$faker->randomElement($array = $satuan_obat),
        //     "jenis_obat" =>$faker->randomElement($array = $jenis_obat),
        //     "min_stock" =>10,
        //     "max_stock" =>$max_obat,
        //     "stock" =>$faker->numberBetween($min = 10, $max_obat),
        //     "tgl_beli" =>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        //     "expire" =>$faker->dateTimeBetween($startDate = 'now', $endDate = '5 years', $timezone = null),
        //     "batch" =>$faker->numerify('OB0##'),
        //     "penyedia_obat" =>$faker->randomElement($array = $penyedia_obat),
        //     "harga_beli" =>$faker->numberBetween($min = 1000, $max_harga-1000),
        //     "harga_jual" =>$max_harga,

        // ]);

        // DB::table("penyedia_obat")->insert([
        //     "nama" =>$faker->numerify('Penyedia Obat #####'),
        // ]);

        // DB::table("daftar_periksa")->insert([
        //     "waktu_daftar_periksa" =>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        //     "id_pasien" =>$faker->randomElement($array = $pasien),
        //     "id_dokter" =>$faker->randomElement($array = $dokter),
        //     "id_poli" =>$faker->randomElement($array = $poliklinik),
        //     "cara_bayar" =>$faker->randomElement($array = ["umum","bpjs","asuransi","keluarga"]),
        //     "rujukan" =>$faker->randomElement($array = ["puskesmas","rsud"]),
        //     "penanggungjawab" =>$faker->randomElement(["pribadi","keluarga"]),
        // ]);

        $jasa_dokter = $faker->numberBetween($min = 1000, $max = 1000000);
        $jasa_perawat = $faker->numberBetween($min = 1000, $max = 1000000);
        $jasa_klinik = $faker->numberBetween($min = 1000, $max = 1000000);
        $alat = $faker->numberBetween($min = 1000, $max = 1000000);
        $bahan = $faker->numberBetween($min = 1000, $max = 1000000);
        $lainnya = $faker->numberBetween($min = 1000, $max = 1000000);
        $harga_total = $jasa_dokter + $jasa_perawat + $jasa_klinik + $alat + $bahan + $lainnya;



        $max_obat = $faker->numberBetween($min = 10, $max = 1000);
            $max_harga = $faker->numberBetween($min = 10, $max = 1000000);
        DB::table("tindakan")->insert([
            "nama" => $faker->numerify('Tindakan #####'),
            "jenis_tindakan" => $faker->randomElement($jenis_tindakan),
            "harga_total" => $harga_total,
            "jasa_dokter" =>$jasa_dokter,
            "jasa_perawat" =>$jasa_perawat,
            "jasa_klinik" =>$jasa_klinik,
            "alat" =>$alat,
            "bahan" =>$bahan,
            "lainnya" =>$lainnya,
        ]);

    }
    }
}
