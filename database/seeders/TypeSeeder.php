<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $types = [
            ['name' => 'Italian'],
            ['name' => 'French'],
            ['name' => 'Chinese'],
            ['name' => 'Japanese'],
            ['name' => 'Mexican'],
            ['name' => 'Indian'],
            ['name' => 'Thai'],
            ['name' => 'Greek'],
            ['name' => 'Spanish'],
            ['name' => 'Korean'],
            ['name' => 'American'],
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->save();
        }
    }
}
