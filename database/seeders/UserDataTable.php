<?php

namespace Database\Seeders;

use App\Models\ACOUNT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserDataTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            // [
            //     'fullname'=>'Nguyễn Anh Khoa',
            //     'birthday'=>'1992-04-21',
            //     'email'=>'admin@gmail.com',
            //     'phone'=>'0865677010',
            //     'address'=>'Quận 7',
            //     'image'=>'',
            //     'password'=>bcrypt('admin'),
            //     'level'=>2,
            //     'status'=>1,
            //     'remember_token' => "",
            //     'dateRegister'=> Carbon::now(),
            //     'loginStatus' => "",
            //     'device_token' =>"",
            // ],
            [
                'fullname'=>'Phạm Thiên Phúc',
                'birthday'=>'1997-10-10',
                'email'=>'phucpham@gmail.com',
                'phone'=>'0909123456',
                'address'=>'Quận 3',
                'image'=>'',
                'password'=>bcrypt('123456789'),
                'level'=>2,
                'status'=>1,
                'remember_token' => "",
                'dateRegister'=> Carbon::now(),
                'loginStatus' => "",
                'device_token' =>"",
            ],
            // [
            //     'fullname'=>'Lưu Vĩnh Hán',
            //     'birthday'=>'1998-08-20',
            //     'email'=>'hanvinh@gmail.com',
            //     'phone'=>'0865123789',
            //     'address'=>'Quận 8',
            //     'image'=>'',
            //     'password'=>bcrypt('12345678'),
            //     'level'=>2,
            //     'status'=>1,
            //     'dateRegister'=> Carbon::now(),
            // ],
        ];

        foreach($user as $key => $value){
            ACOUNT::create($value);
        }

    }
}
