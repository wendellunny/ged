<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Structure::insert([
            'uuid' => (string) Str::uuid(),
            'name' => 'root',
            'structure_parent' => null,
            'path' => '/public/pavao'
        ]);
    }
}
