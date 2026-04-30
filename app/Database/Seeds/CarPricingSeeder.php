<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CarPricingSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        $this->db->table('models')->truncate();
        $this->db->table('brands')->truncate();

        // Car data with pricing
        $carData = [
            'Audi' => [
                'A3' => 3500, 'A4' => 3500, 'A6' => 3500, 'A8' => 3500,
                'Q3' => 4200, 'Q5' => 4200, 'Q7' => 4200, 'Q8' => 4200, 'Others' => 4200
            ],
            'BMW' => [
                '2 Series' => 3500, '3 Series' => 3500, '5 Series' => 3500, '7 Series' => 3500,
                'X1' => 4200, 'X3' => 4200, 'X5' => 4200, 'X7' => 4200
            ],
            'Ford' => [
                'Figo' => 1600, 'Aspire' => 2000, 'EcoSport' => 2500, 'Endeavour' => 3000
            ],
            'Honda' => [
                'Amaze' => 2000, 'City' => 2000, 'Jazz' => 2000, 'WR-V' => 2000, 'Elevate' => 2500
            ],
            'Hyundai' => [
                'i10' => 1600, 'i20' => 2000, 'Aura' => 2000, 'Verna' => 2000,
                'Venue' => 2500, 'Creta' => 2500, 'Alcazar' => 2500, 'Tucson' => 3000
            ],
            'Jaguar' => [
                'XE' => 3500, 'XF' => 3500, 'XJ' => 3500, 'F-PACE' => 3500, 'E-PACE' => 3500
            ],
            'Jeep' => [
                'Compass' => 3000, 'Meridian' => 3000, 'Wrangler' => 3000, 'Grand Cherokee' => 3500
            ],
            'Kia' => [
                'Sonet' => 2500, 'Seltos' => 2500, 'Carens' => 2500, 'Carnival' => 3500, 'EV6' => 3000
            ],
            'Land Rover' => [
                'Range Rover' => 4200, 'Range Rover Sport' => 4200, 'Velar' => 4200,
                'Evoque' => 4200, 'Discovery' => 4200, 'Defender' => 4200
            ],
            'Mahindra' => [
                'Thar' => 2500, 'Scorpio' => 2500, 'Scorpio-N' => 2500,
                'XUV300' => 2500, 'XUV700' => 3000, 'Bolero' => 2500
            ],
            'Mercedes-Benz' => [
                'A-Class' => 3500, 'C-Class' => 3500, 'E-Class' => 4200, 'S-Class' => 4200,
                'GLA' => 3500, 'GLC' => 3500, 'GLE' => 3500, 'GLS' => 3500
            ],
            'MG' => [
                'Hector' => 3500, 'Hector Plus' => 3500, 'Astor' => 2000, 'Gloster' => 3500, 'ZS EV' => 3500
            ],
            'Mitsubishi' => [
                'Pajero Sport' => 3500, 'Pajero' => 3500, 'Outlander' => 3500, 'Lancer' => 2500
            ],
            'Nissan' => [
                'Micra' => 1600, 'Sunny' => 2000, 'Magnite' => 2000, 'Kicks' => 1600, 'X-Trail' => 2500
            ],
            'Renault' => [
                'Kwid' => 1600, 'Triber' => 2000, 'Kiger' => 2500, 'Duster' => 2500, 'Lodgy' => 2500
            ],
            'Skoda' => [
                'Rapid' => 2000, 'Slavia' => 2000, 'Octavia' => 2000,
                'Superb' => 3500, 'Kushaq' => 2500, 'Kodiaq' => 2500
            ],
            'Suzuki' => [
                'Alto' => 1600, 'Swift' => 1600, 'Baleno' => 1600, 'Dzire' => 2000,
                'Brezza' => 2500, 'Ertiga' => 2500, 'XL6' => 2500, 'Grand Vitara' => 2500
            ],
            'Tata' => [
                'Tiago' => 1600, 'Tigor' => 2000, 'Altroz' => 1600, 'Punch' => 2000,
                'Nexon' => 2000, 'Harrier' => 2500, 'Safari' => 2500
            ],
            'Toyota' => [
                'Glanza' => 2000, 'Urban Cruiser' => 2500, 'Hyryder' => 2500,
                'Innova Crysta' => 2500, 'Innova Hycross' => 2500, 'Fortuner' => 3500, 'Camry' => 2500
            ],
            'Volkswagen' => [
                'Polo' => 1600, 'Vento' => 2000, 'Virtus' => 2000, 'Taigun' => 2500, 'Tiguan' => 2500
            ],
            'Volvo' => [
                'S60' => 3500, 'S90' => 3500, 'XC40' => 4200, 'XC60' => 4200, 'XC90' => 4200
            ],
            'Others' => [
                'Hatchback' => 1600, 'Sedan' => 2000, 'SUV' => 2500
            ],
            'Others Premium' => [
                'Luxury Hatchback' => 3000, 'Luxury Sedan' => 3500, 'Luxury SUV' => 4200
            ]
        ];

        // Insert brands and models
        foreach ($carData as $brandName => $models) {
            // Create slug from brand name
            $brandSlug = strtolower(str_replace([' ', '-'], '_', $brandName));
            
            // Insert brand
            $brandData = [
                'name' => $brandName,
                'slug' => $brandSlug,
                'logo' => $brandSlug . '.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            
            $this->db->table('brands')->insert($brandData);
            $brandId = $this->db->insertID();

            // Insert models for this brand
            foreach ($models as $modelName => $price) {
                $modelSlug = strtolower(str_replace([' ', '-'], '_', $modelName));
                
                $modelData = [
                    'brand_id' => $brandId,
                    'name' => $modelName,
                    'slug' => $modelSlug,
                    'price' => $price,
                    'image' => $modelSlug . '.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
                
                $this->db->table('models')->insert($modelData);
            }
        }
    }
}
