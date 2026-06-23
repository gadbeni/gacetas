<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'users',
                'slug' => 'users',
                'display_name_singular' => 'User',
                'display_name_plural' => 'Users',
                'icon' => 'voyager-person',
                'model_name' => 'TCG\\Voyager\\Models\\User',
                'policy_name' => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:30',
                'updated_at' => '2021-06-02 17:55:30',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'menus',
                'slug' => 'menus',
                'display_name_singular' => 'Menu',
                'display_name_plural' => 'Menus',
                'icon' => 'voyager-list',
                'model_name' => 'TCG\\Voyager\\Models\\Menu',
                'policy_name' => NULL,
                'controller' => '',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:30',
                'updated_at' => '2021-06-02 17:55:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'roles',
                'slug' => 'roles',
                'display_name_singular' => 'Role',
                'display_name_plural' => 'Roles',
                'icon' => 'voyager-lock',
                'model_name' => 'TCG\\Voyager\\Models\\Role',
                'policy_name' => NULL,
                'controller' => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'description' => '',
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => NULL,
                'created_at' => '2021-06-02 17:55:31',
                'updated_at' => '2021-06-02 17:55:31',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'permissions',
                'slug' => 'permissions',
                'display_name_singular' => 'Permiso',
                'display_name_plural' => 'Permisos',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Models\\Permission',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":"table_name","order_display_column":"table_name","order_direction":"asc","default_search_key":null}',
                'created_at' => '2021-10-05 10:10:30',
                'updated_at' => '2021-10-05 10:10:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'publications_types',
                'slug' => 'publications-types',
                'display_name_singular' => 'Tipo de publicación',
                'display_name_plural' => 'Tipos de publicación',
                'icon' => 'voyager-list',
                'model_name' => 'App\\Models\\PublicationsType',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-10-06 12:29:38',
                'updated_at' => '2021-10-06 14:36:48',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'publications',
                'slug' => 'publications',
                'display_name_singular' => 'Publicación',
                'display_name_plural' => 'Publicaciones',
                'icon' => 'voyager-certificate',
                'model_name' => 'App\\Models\\Publication',
                'policy_name' => NULL,
                'controller' => 'App\\Http\\Controllers\\Admin\\PublicationController',
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-10-06 12:40:05',
                'updated_at' => '2021-10-11 21:01:49',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'officials',
                'slug' => 'officials',
                'display_name_singular' => 'Funcionario',
                'display_name_plural' => 'Funcionarios',
                'icon' => 'voyager-people',
                'model_name' => 'App\\Models\\Official',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null}',
                'created_at' => '2021-10-11 11:31:09',
                'updated_at' => '2021-10-11 11:31:09',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'frequent_questions',
                'slug' => 'frequent-questions',
                'display_name_singular' => 'Pregunta frecuente',
                'display_name_plural' => 'Preguntas frecuentes',
                'icon' => 'voyager-question',
                'model_name' => 'App\\Models\\FrequentQuestion',
                'policy_name' => NULL,
                'controller' => NULL,
                'description' => NULL,
                'generate_permissions' => 1,
                'server_side' => 0,
                'details' => '{"order_column":null,"order_display_column":null,"order_direction":"asc","default_search_key":null,"scope":null}',
                'created_at' => '2021-10-11 11:38:31',
                'updated_at' => '2021-10-11 11:46:13',
            ),
        ));
        
        
    }
}