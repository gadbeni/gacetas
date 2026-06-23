<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FrequentQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('frequent_questions')->delete();

        \DB::table('frequent_questions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'title' => '¿Qué es la Gaceta Oficial del Gobierno Autónomo Departamental del Beni?',
                'tags' => NULL,
                'description' => '<p>Es el órgano oficial de publicación y difusión que tiene por objeto dar a conocer de manera permanente las Leyes Departamentales, Decretos Departamentales y de Gobernación, Resoluciones de Gobernación y Administrativas, y todo documento de carácter general que emita el Ejecutivo Departamental del Beni.</p>',
                'created_at' => '2021-10-11 15:14:02',
                'updated_at' => '2021-10-11 15:14:02',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'title' => '¿Qué tipo de documentos puedo consultar en la Gaceta?',
                'tags' => NULL,
                'description' => '<p>Puedes consultar Leyes Departamentales, Decretos Departamentales y de Gobernación, así como Resoluciones de Gobernación y Administrativas. Cada categoría está organizada por tipo de publicación para facilitar tu búsqueda.</p>',
                'created_at' => '2021-10-11 15:14:28',
                'updated_at' => '2021-10-11 15:14:28',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'title' => '¿Cómo descargo una publicación?',
                'tags' => NULL,
                'description' => '<p>Ingresa a la categoría correspondiente desde la página principal, utiliza el buscador para encontrar la norma que necesitas y presiona el botón <strong>Descargar</strong> para obtener el documento oficial en formato digital.</p>',
                'created_at' => '2021-10-11 15:14:40',
                'updated_at' => '2021-10-11 15:14:40',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'title' => '¿Las publicaciones de la Gaceta tienen validez oficial?',
                'tags' => NULL,
                'description' => '<p>Sí. La Gaceta Oficial custodia y salvaguarda cronológicamente la normativa emitida por el Ejecutivo Departamental del Beni, constituyéndose en la fuente oficial de consulta y difusión de dichos documentos.</p>',
                'created_at' => '2021-10-11 15:14:52',
                'updated_at' => '2021-10-11 15:14:52',
                'deleted_at' => NULL,
            ),
        ));


    }
}
