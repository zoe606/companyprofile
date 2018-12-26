<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'title' => 'Docotel',
            'tagline' => 'Company Profile',
            'email' => 'docotel@gmail.com',
            'phone' => '(022) 82000063',
            'address' => 'Jl. Sukahaji No.42, Sukarasa, Sukasari, Kota Bandung, Jawa Barat 40152',
            'so_facebook' => '-',
            'so_twitter' => '-',
            'so_instagram' => '-'
        ];

        DB::table('settings')->insert($settings);
    }
}
