<?php
namespace Database\Seeders;
use App\Models\Service;
use App\Models\ServiceTranslation;
use Illuminate\Database\Seeder;

class ServiceTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [
            1 => [
                'name' => "Women's haircut",
                'description' => 'Haircut and hair styling',
            ],
            2 => [
                'name' => "Men's haircut",
                'description' => 'Haircut and hair styling',
            ],
            3 => [
                'name' => "Children's haircut",
                'description' => 'Haircut and hair styling',
            ],
            4 => [
                'name' => 'Hair restoration',
                'description' => 'Hair restoration and reconstruction using a product selected by the stylist during consultation',
            ],
            6 => [
                'name' => 'Manicure',
                'description' => 'Nail extensions or gel polish application',
            ],
            8 => [
                'name' => 'Scalp massage',
                'description' => 'Manual scalp massage that promotes relaxation and stimulates hair growth',
            ],
            9 => [
                'name' => 'Bridal makeup',
                'description' => "Bridal makeup based on a reference photo or the makeup artist's recommendations",
            ],

10 => [
    'name' => 'Daytime makeup',
    'description' => 'Natural daytime makeup that enhances your individuality',
],
11 => [
    'name' => 'Evening makeup',
    'description' => 'Evening makeup for your special occasion',
],
12 => [
    'name' => '2D eyelash extensions',
    'description' => '2D eyelash extensions with all types of curls',
],
13 => [
    'name' => '3D eyelash extensions',
    'description' => '3D eyelash extensions with all types of curls',
],
14 => [
    'name' => '4D+ eyelash extensions',
    'description' => 'Dramatic 4D+ eyelash extensions with all types of curls',
],
15 => [
    'name' => 'Scalp peeling',
    'description' => 'Deep scalp exfoliation that removes dead skin cells, improves blood circulation and promotes hair growth',
],
        ];

        foreach ($translations as $id => $english) {
            $service = Service::find($id);

            if (!$service) {
                continue;
            }

            ServiceTranslation::updateOrCreate(
                ['service_id' => $id, 'lang' => 'uk'],
                [
                    'name' => $service->name,
                    'description' => $service->description,
                ]
            );

            ServiceTranslation::updateOrCreate(
                ['service_id' => $id, 'lang' => 'en'],
                [
                    'name' => $english['name'],
                    'description' => $english['description'],
                ]
            );
        }
    }
}