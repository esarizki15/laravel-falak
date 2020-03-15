<?php

use Illuminate\Database\Seeder;
use App\Bulan;
class BulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Basithoh
        $bulan = new Bulan();
        $bulan->nama = "Januari";
        $bulan->nomor = 1;
        $bulan->nilai = 31;
        $bulan->jumlah = 31;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Februari";
        $bulan->nomor = 2;
        $bulan->nilai = 28;
        $bulan->jumlah = 59;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Maret";
        $bulan->nilai = 31;
        $bulan->nomor = 3;     
        $bulan->jumlah = 90;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "April";
        $bulan->nomor = 4;
        $bulan->nilai = 30;
        $bulan->jumlah = 120;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Mei";
        $bulan->nomor = 5;
        $bulan->nilai = 31;
        $bulan->jumlah = 151;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Juni";
        $bulan->nomor = 6;
        $bulan->nilai = 30;
        $bulan->jumlah = 181;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Juli";
        $bulan->nomor = 7;
        $bulan->nilai = 31;
        $bulan->jumlah = 212;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Agustus";
        $bulan->nomor = 8;
        $bulan->nilai = 31;
        $bulan->jumlah = 243;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "September";
        $bulan->nomor = 9;
        $bulan->nilai = 30;
        $bulan->jumlah = 273;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Oktober";
        $bulan->nomor = 10;
        $bulan->nilai = 31;
        $bulan->jumlah = 304;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "November";
        $bulan->nomor = 11;
        $bulan->nilai = 30;
        $bulan->jumlah = 334;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Desember";
        $bulan->nomor = 12;
        $bulan->nilai = 31;
        $bulan->jumlah = 365;
        $bulan->save();

        // Kabisat
        $bulan = new Bulan();
        $bulan->nama = "Januari";
        $bulan->nomor = 1;
        $bulan->nilai = 31; 
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 31;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Februari";
        $bulan->nomor = 2;
        $bulan->nilai = 29;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 60;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Maret";
        $bulan->nomor = 3;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 91;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "April";
        $bulan->nomor = 4;
        $bulan->nilai = 30;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 121;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Mei";
        $bulan->nomor = 5;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 152;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Juni";
        $bulan->nomor = 6;
        $bulan->nilai = 30;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 182;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Juli";
        $bulan->nomor = 7;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 213;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Agustus";
        $bulan->nomor = 8;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 244;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "September";
        $bulan->nomor = 9;
        $bulan->nilai = 30;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 274;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Oktober";
        $bulan->nomor = 10;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 305;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "November";
        $bulan->nomor = 11;
        $bulan->nilai = 30;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 335;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "Desember";
        $bulan->nomor = 12;
        $bulan->nilai = 31;
        $bulan->jenis_tahun = 1;
        $bulan->jumlah = 366;
        $bulan->save();

        // Basithoh
        $bulan = new Bulan();
        $bulan->nama = "محرم";
        $bulan->nomor = 1;
        $bulan->nilai = 30;
        $bulan->jumlah = 30;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "صفر";
        $bulan->nomor = 2;
        $bulan->nilai = 29;
        $bulan->jumlah = 59;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ربيع اﻷول";
        $bulan->nilai = 30;
        $bulan->nomor = 3;     
        $bulan->jumlah = 89;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ربيع اﻷخير";
        $bulan->nomor = 4;
        $bulan->nilai = 29;
        $bulan->jumlah = 118;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "جمادى اﻷولى";
        $bulan->nomor = 5;
        $bulan->nilai = 30;
        $bulan->jumlah = 148;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "جمادى اﻷخيرة";
        $bulan->nomor = 6;
        $bulan->nilai = 29;
        $bulan->jumlah = 177;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "رجب";
        $bulan->nomor = 7;
        $bulan->nilai = 30;
        $bulan->jumlah = 207;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "شعبان";
        $bulan->nomor = 8;
        $bulan->nilai = 29;
        $bulan->jumlah = 236;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "رمضان";
        $bulan->nomor = 9;
        $bulan->nilai = 30;
        $bulan->jumlah = 266;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "شوال";
        $bulan->nomor = 10;
        $bulan->nilai = 29;
        $bulan->jumlah = 295;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ذو القعدة";
        $bulan->nomor = 11;
        $bulan->nilai = 30;
        $bulan->jumlah = 325;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ذو الحجة";
        $bulan->nomor = 12;
        $bulan->nilai = 29;
        $bulan->jumlah = 354;
        $bulan->jenis_bulan = "H";
        $bulan->save();

        // Kabisat
        $bulan = new Bulan();
        $bulan->nama = "محرم";
        $bulan->nomor = 1;
        $bulan->nilai = 30;
        $bulan->jumlah = 30;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "صفر";
        $bulan->nomor = 2;
        $bulan->nilai = 29;
        $bulan->jumlah = 59;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ربيع اﻷول";
        $bulan->nilai = 30;
        $bulan->nomor = 3;     
        $bulan->jumlah = 89;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ربيع اﻷخير";
        $bulan->nomor = 4;
        $bulan->nilai = 29;
        $bulan->jumlah = 118;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "جمادى اﻷولى";
        $bulan->nomor = 5;
        $bulan->nilai = 30;
        $bulan->jumlah = 148;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "جمادى اﻷخيرة";
        $bulan->nomor = 6;
        $bulan->nilai = 29;
        $bulan->jumlah = 177;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "رجب";
        $bulan->nomor = 7;
        $bulan->nilai = 30;
        $bulan->jumlah = 207;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "شعبان";
        $bulan->nomor = 8;
        $bulan->nilai = 29;
        $bulan->jumlah = 236;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "رمضان";
        $bulan->nomor = 9;
        $bulan->nilai = 30;
        $bulan->jumlah = 266;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "شوال";
        $bulan->nomor = 10;
        $bulan->nilai = 29;
        $bulan->jumlah = 295;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ذو القعدة";
        $bulan->nomor = 11;
        $bulan->nilai = 30;
        $bulan->jumlah = 325;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();

        $bulan = new Bulan();
        $bulan->nama = "ذو الحجة";
        $bulan->nomor = 12;
        $bulan->nilai = 30;
        $bulan->jumlah = 355;
        $bulan->jenis_bulan = "H";
        $bulan->jenis_tahun = 1;
        $bulan->save();
    }
}
