<?php

use Illuminate\Database\Seeder;
use App\Nacionalidade;

class NacionalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nacionalidade::create(['descricao' => 'Brasileira']);
        Nacionalidade::create(['descricao' => 'Argentina']);
        Nacionalidade::create(['descricao' => 'Norte-Americana']);
        Nacionalidade::create(['descricao' => 'Alemã']);
        Nacionalidade::create(['descricao' => 'Francesa']);
        Nacionalidade::create(['descricao' => 'Italiana']);
        Nacionalidade::create(['descricao' => 'Espanhola']);
        Nacionalidade::create(['descricao' => 'Japonesa']);
        Nacionalidade::create(['descricao' => 'Chinesa']);
        Nacionalidade::create(['descricao' => 'Australiana']);
        Nacionalidade::create(['descricao' => 'Sul-Africana']);
        Nacionalidade::create(['descricao' => 'Egípcia']);
        Nacionalidade::create(['descricao' => 'Mexicana']);
        Nacionalidade::create(['descricao' => 'Polonesa']);
        Nacionalidade::create(['descricao' => 'Canadense']);
    }
}
