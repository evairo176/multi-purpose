<?php

namespace Database\Seeders;

use App\Models\tb_moving_average;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovingAverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_moving_average')->delete();

        $users = [
            [
                'bulan' => 'January',
                'pa' => 81
            ],
            [
                'bulan' => 'February',
                'pa' => 84
            ],
            [
                'bulan' => 'Maret',
                'pa' => 89
            ],
            [
                'bulan' => 'April',
                'pa' => 82
            ],
            [
                'bulan' => 'Mei',
                'pa' => 83
            ],
            [
                'bulan' => 'Juni',
                'pa' => 88
            ],
            [
                'bulan' => 'Juli',
                'pa' => 79
            ],
            [
                'bulan' => 'Agustus',
                'pa' => 86
            ],
            [
                'bulan' => 'September',
                'pa' => 87
            ],
            [
                'bulan' => 'Oktober',
                'pa' => 85
            ],
            [
                'bulan' => 'November',
                'pa' => 89
            ],
            [
                'bulan' => 'Desember',
                'pa' => 84
            ],
        ];

        tb_moving_average::insert($users);
    }
}
