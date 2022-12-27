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
            [
                'fullname'=>'Nguyễn Anh Khoa',
                'birthday'=>'1992-04-21',
                'email'=>'nguyenkhoa@gmail.com',
                'phone'=>'0865677010',
                'address'=>'Quận 7',
                'image'=>'',
                'password'=>bcrypt('123456'),
                'level'=>2,
                'status'=>1,
                'dateRegister'=> Carbon::now(),
            ],
            [
                'fullname'=>'Phạm Văn Mẫn',
                'birthday'=>'1997-10-10',
                'email'=>'manpham@gmail.com',
                'phone'=>'0909123456',
                'address'=>'Quận 11',
                'image'=>'',
                'password'=>bcrypt('1234567'),
                'level'=>2,
                'status'=>1,
                'dateRegister'=> Carbon::now(),
            ],
            [
                'fullname'=>'Lưu Vĩnh Hán',
                'birthday'=>'1998-08-20',
                'email'=>'hanvinh@gmail.com',
                'phone'=>'0865123789',
                'address'=>'Quận 8',
                'image'=>'',
                'password'=>bcrypt('12345678'),
                'level'=>2,
                'status'=>1,
                'dateRegister'=> Carbon::now(),
            ],
        ];

        foreach($user as $key => $value){
            ACOUNT::create($value);
        }

    }
}
