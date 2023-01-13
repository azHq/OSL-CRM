<?php

namespace Database\Seeders;

use App\Models\Lead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lead::create([
            'name' => 'Sagoreka Yesmin',
            'email' => 'sagorekayasmin@gmail.com',
            'mobile' => '8801722957920',
            'status' => 'Raw leads',
            'source' => 'Study in the UK 07:10'
        ]);

        Lead::create([
            'name' => 'Ał Abir',
            'email' => 'mr.joker2652@gmail.com',
            'mobile' => '8801312204649',
            'status' => 'Raw leads',
            'source' => 'Study in the UK 07:10'
        ]);

        Lead::create([
            'name' => 'Omar Faruq',
            'email' => 'princeomarfaruk668@gmail.com',
            'mobile' => '8801700958894',
            'status' => 'In-progress leads',
            'source' => 'Study in the UK 07:10'
        ]);

        Lead::create([
            'name' => 'kamruzzaman shamim',
            'email' => 'shamim46@gmail.com',
            'mobile' => '8801970054646',
            'status' => 'Raw leads',
            'source' => 'Study in the UK 07:10'
        ]);
    }
}
