<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('services')->insert([
	   ['id'=>'01', 'name'=>'Жіноча стрижка', 'category'=>'Перукарські послуги', 'price_master'=>500, 'price_top_master'=>700,'description'=>'Стрижка та укладка волосся'],
	   ['id'=>'02', 'name'=>'Чоловіча стрижка', 'category'=>'Перукарські послуги', 'price_master'=>400, 'price_top_master'=>600, 'description'=>'Стрижка та укладка волосся'],
	   ['id'=>'03', 'name'=>'Дитяча стрижка', 'category'=>'Перукарські послуги', 'price_master'=>300, 'price_top_master'=>500, 'description'=>'Стрижка та укладка волосся'],
	   ['id'=>'04', 'name'=>'Відновлення волосся', 'category'=>'Перукарські послуги', 'price_master'=>1700, 'price_top_master'=>2000, 'description'=>'Відновлення та реконструкція волосся засобом, підібраним майстром під час консультації'],
	   ['id'=>'05', 'name'=>'Складні техніки фарбування волосся', 'category'=>'Перукарські послуги', 'price_master'=>5000, 'price_top_master'=>7000, 'description'=>'Фарбування та укладка волосся'],
	   ['id'=>'06', 'name'=>'Манікюр', 'category'=>'Манікюрні послуги', 'price_master'=>1500, 'price_top_master'=>2000,'description'=>'Нарощення/покриття нігтів гель лаком'],
	   ['id'=>'07', 'name'=>'Педикюр', 'category'=>'Манікюрні послуги', 'price_master'=>1000, 'price_top_master'=>1300, 'description'=>'Покриття нігтів гель лаком + масаж ніг'],
	   ['id'=>'08', 'name'=>'Масаж голови', 'category'=>'Перукарські послуги', 'price_master'=>200, 'price_top_master'=>300, 'description'=>'Мануальний масаж голови, що розслабляє та прискорює ріст волосся'],
	   ['id'=>'09', 'name'=>'Макіяж весільний', 'category'=>'Послуги візажиста', 'price_master'=>2000, 'price_top_master'=>2200, 'description'=>'Весільний макіяж за референсом або за рекомедаціями візажиста'],
	   ['id'=>'10', 'name'=>'Макіяж денний', 'category'=>'Послуги візажиста', 'price_master'=>1500, 'price_top_master'=>1700, 'description'=>'Натуральний денний макіяж, що підкреслить вашу унікальність'],
	   ['id'=>'11', 'name'=>'Макіяж вечірній', 'category'=>'Послуги візажиста', 'price_master'=>2000, 'price_top_master'=>2200, 'description'=>'Вечірній макіяж для вашої особливої події'],
	   ['id'=>'12', 'name'=>'Нарощення вій 2D', 'category'=>'Послуги лашмейкера', 'price_master'=>1000, 'price_top_master'=>1200, 'description'=>'Нарощення вій ефект 2D ,усі види вигинів'],
	   ['id'=>'13', 'name'=>'Нарощення вій 3D', 'category'=>'Послуги лашмейкера', 'price_master'=>1300, 'price_top_master'=>1500, 'description'=>'Нарощення вій ефект 3D ,усі види вигинів'],
	   ['id'=>'14', 'name'=>'Нарощення вій 4D+', 'category'=>'Послуги лашмейкера', 'price_master'=>1500, 'price_top_master'=>1700, 'description'=>'Нарощення вій яскравіших ефектів ,усі види вигинів'],
	   ]);
    }
}
