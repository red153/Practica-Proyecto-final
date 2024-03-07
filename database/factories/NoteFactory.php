<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{

    protected $model = Note::class;


    public function definition()
    {
        return [
            'titulo' => $this->faker->word, // Genera una frase aleatoria para el título.
            'contenido' => $this->faker->sentence, // Genera un párrafo aleatorio para el contenido.
            'user_id' => 1, // Crea un nuevo usuario y usa su ID.
        ];
    }
}
