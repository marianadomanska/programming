<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
	   DB::table('country')->insert([
	   ['code'=>'AU', 'name'=>'Australia', 'population'=>24016400],
	   ['code'=>'UA', 'name'=>'Ukraine', 'population'=>4167894],
	   ['code'=>'PL', 'name'=>'Poland', 'population'=>2334321],
	   ['code'=>'DE', 'name'=>'Germany', 'population'=>2534546],
	   ['code'=>'AZ', 'name'=>'Azerbaijan', 'population'=>2876543],
	   ['code'=>'BZ', 'name'=>'Beliz', 'population'=>23456734],
	   ['code'=>'BR', 'name'=>'Brazil', 'population'=>9876543],
	   ['code'=>'VN', 'name'=>'Vjetnam', 'population'=>23456785],
	   ['code'=>'EG', 'name'=>'Egypt', 'population'=>76543345],
	   ['code'=>'IE', 'name'=>'Ireland', 'population'=>7543345],
	   ]);
    }
}
