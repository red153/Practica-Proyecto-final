<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Note::factory()->count(20)->create(); // Crea 50 notas con usuarios relacionados.
    }
}
