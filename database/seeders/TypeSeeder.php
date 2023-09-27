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
        $names = ['Sushi', 'Pizza', 'Pasta', 'italian', 'turkish', 'Greek', 'Spanish', 'Kebab', 'Healty', 'Chinese', 'Burgers', 'Indian'];

        foreach ($names as $name) {
            $type = new Type();
            $type->name = $name;
            $type->save();
        }
    }
}
