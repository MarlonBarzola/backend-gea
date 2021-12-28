<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Library::create([
            'name' => 'Libro 1',
            'body' => 'lorem ipsum',
            'category_id' => 1
        ]);
        Library::create([
            'name' => 'Libro 2',
            'body' => 'lorem ipsum',
            'category_id' => 1
        ]);
        Library::create([
            'name' => 'Libro 3',
            'body' => 'lorem ipsum',
            'category_id' => 2
        ]);
        Library::create([
            'name' => 'Libro 4',
            'body' => 'lorem ipsum',
            'category_id' => 2
        ]);
    }
}
