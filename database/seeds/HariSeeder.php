<?php

use Illuminate\Database\Seeder;
use App\Hari;
use App\User;
class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Esa Rizki";
        $user->email = "esarizki15@gmail.com";
        $user->password = bcrypt("02091997");
        $user->save();

        $hari = new Hari();
        $hari->nama = "Sabtu";
        $hari->nilai = 1;
        $hari->jenis = 7;
        $hari->save();

        $hari1 = new Hari();
        $hari1->nama = "Ahad";
        $hari1->nilai = 2;
        $hari1->jenis = 7;
        $hari1->save();

        $hari2 = new Hari();
        $hari2->nama = "Senin";
        $hari2->nilai = 3;
        $hari2->jenis = 7;
        $hari2->save();

        $hari3 = new Hari();
        $hari3->nama = "Selasa";
        $hari3->nilai = 4;
        $hari3->jenis = 7;
        $hari3->save();

        $hari4 = new Hari();
        $hari4->nama = "Rabu";
        $hari4->nilai = 5;
        $hari4->jenis = 7;
        $hari4->save();

        $hari5 = new Hari();
        $hari5->nama = "Kamis";
        $hari5->nilai = 6;
        $hari5->jenis = 7;
        $hari5->save();

        $hari6 = new Hari();
        $hari6->nama = "Jumat";
        $hari6->nilai = 0;
        $hari6->jenis = 7;
        $hari6->save();

        $pasaran = new Hari();
        $pasaran->nama = "Kliwon";
        $pasaran->nilai = 1;
        $pasaran->jenis = 5;
        $pasaran->save();
        
        $pasaran1 = new Hari();
        $pasaran1->nama = "Legi";
        $pasaran1->nilai = 2;
        $pasaran1->jenis = 5;
        $pasaran1->save();
        
        $pasaran2 = new Hari();
        $pasaran2->nama = "Pahing";
        $pasaran2->nilai = 3;
        $pasaran2->jenis = 5;
        $pasaran2->save();
        
        $pasaran3 = new Hari();
        $pasaran3->nama = "Pon";
        $pasaran3->nilai = 4;
        $pasaran3->jenis = 5;
        $pasaran3->save();

        $pasaran4 = new Hari();
        $pasaran4->nama = "Wage";
        $pasaran4->nilai = 0;
        $pasaran4->jenis = 5;
        $pasaran4->save();
    }
}
