<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('admins')->delete();
        $adminRecords = [
            ['id'=>1,'name'=>'Md. Imran Hossain','type'=>'admin','mobile'=>'01771045019','email'=>'mdimranhossain985@gmail.com','password'=>'$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu','image'=>'','status'=>1,
            ],
            ['id'=>2,'name'=>'Imran','type'=>'subadmin','mobile'=>'01687663654','email'=>'imrancsecity@gmail.com','password'=>'$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu','image'=>'','status'=>1,
            ],
            ['id'=>3,'name'=>'Md. Imran','type'=>'subadmin','mobile'=>'01771045019','email'=>'admin@admin.com','password'=>'$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu','image'=>'','status'=>1,
            ],
            ['id'=>4,'name'=>'Md. Imran','type'=>'subadmin','mobile'=>'01771045019','email'=>'test@admin.com','password'=>'$2a$12$GYZx235ezFaYYa3Oxornx.6fa1p8nBm20t4eA9yD./orC2oH/eUcy','image'=>'','status'=>1,
            ],
            ['id'=>5,'name'=>'jislam','type'=>'subadmin','mobile'=>'01771045019','email'=>'jislam@admin.com','password'=>'$2a$12$RSDqi65XW57ZYf0JwGN9/eo4fNS.xqUdsfLiPPdqoY0SUW8ofoKeq','image'=>'','status'=>1,
            ],
            ['id'=>6,'name'=>'N K Joha','type'=>'subadmin','mobile'=>'01771045019','email'=>'nkzoha@gmail.com','password'=>'$2y$10$8dbajWp9YGEYqRPXTxWegeiF0N/CmijMt5Osugwq.J4sdWsmfum02','image'=>'','status'=>1,
            ],
            ['id'=>7,'name'=>'Jabed Akhter','type'=>'subadmin','mobile'=>'01771045019','email'=>'jabedakhter@gmail.com','password'=>'$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu','image'=>'','status'=>1,
            ],
            ['id'=>8,'name'=>'Tamanna','type'=>'subadmin','mobile'=>'01771045019','email'=>'tamanna@gmail.com','password'=>'$2y$10$RUGGY.tiiM53AaLJwYTipeBU0qg8OheTB5NBs0/0KQ65M3rhxrTLu','image'=>'','status'=>1,
            ],

        ];

        DB::table('admins')->insert($adminRecords);
    }
}
