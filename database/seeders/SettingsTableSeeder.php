<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'details' => '',
                'display_name' => 'Site Title',
                'group' => 'Site',
                'id' => 1,
                'key' => 'site.title',
                'order' => 1,
                'type' => 'text',
                'value' => 'Gaceta',
            ),
            1 => 
            array (
                'details' => '',
                'display_name' => 'Site Description',
                'group' => 'Site',
                'id' => 2,
                'key' => 'site.description',
                'order' => 2,
                'type' => 'text',
                'value' => 'Publicación de Leyes, Decretos y Resoluciones',
            ),
            2 => 
            array (
                'details' => '',
                'display_name' => 'Site Logo',
                'group' => 'Site',
                'id' => 3,
                'key' => 'site.logo',
                'order' => 3,
                'type' => 'image',
                'value' => '',
            ),
            3 => 
            array (
                'details' => '',
                'display_name' => 'Google Analytics Tracking ID',
                'group' => 'Site',
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'order' => 11,
                'type' => 'text',
                'value' => NULL,
            ),
            4 => 
            array (
                'details' => '',
                'display_name' => 'Admin Background Image',
                'group' => 'Admin',
                'id' => 5,
                'key' => 'admin.bg_image',
                'order' => 4,
                'type' => 'image',
                'value' => '',
            ),
            5 => 
            array (
                'details' => '',
                'display_name' => 'Admin Title',
                'group' => 'Admin',
                'id' => 6,
                'key' => 'admin.title',
                'order' => 1,
                'type' => 'text',
                'value' => 'Gaceta',
            ),
            6 => 
            array (
                'details' => '',
                'display_name' => 'Admin Description',
                'group' => 'Admin',
                'id' => 7,
                'key' => 'admin.description',
                'order' => 1,
                'type' => 'text',
                'value' => 'Sistema para administración de publicaciones de leyes, decretos y resoluciones.',
            ),
            7 => 
            array (
                'details' => '',
                'display_name' => 'Admin Loader',
                'group' => 'Admin',
                'id' => 8,
                'key' => 'admin.loader',
                'order' => 2,
                'type' => 'image',
                'value' => '',
            ),
            8 => 
            array (
                'details' => '',
                'display_name' => 'Admin Icon Image',
                'group' => 'Admin',
                'id' => 9,
                'key' => 'admin.icon_image',
                'order' => 3,
                'type' => 'image',
                'value' => '',
            ),
            9 => 
            array (
                'details' => '',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'group' => 'Admin',
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
                'order' => 5,
                'type' => 'text',
                'value' => NULL,
            ),
            10 => 
            array (
                'details' => NULL,
                'display_name' => 'Site Banner',
                'group' => 'Site',
                'id' => 11,
                'key' => 'site.banner',
                'order' => 4,
                'type' => 'image',
                'value' => '',
            ),
            11 => 
            array (
                'details' => NULL,
                'display_name' => 'Site Background',
                'group' => 'Site',
                'id' => 13,
                'key' => 'site.background',
                'order' => 7,
                'type' => 'image',
                'value' => '',
            ),
            12 => 
            array (
                'details' => NULL,
                'display_name' => 'Site Phone',
                'group' => 'Site',
                'id' => 14,
                'key' => 'site.phone',
                'order' => 8,
                'type' => 'text',
                'value' => '+591 75199157',
            ),
            13 => 
            array (
                'details' => NULL,
                'display_name' => 'Site Address',
                'group' => 'Site',
                'id' => 15,
                'key' => 'site.address',
                'order' => 9,
                'type' => 'text',
                'value' => 'A108 Adam Street, New York, NY 535022',
            ),
            14 => 
            array (
                'details' => NULL,
                'display_name' => 'Site Email',
                'group' => 'Site',
                'id' => 16,
                'key' => 'site.email',
                'order' => 10,
                'type' => 'text',
                'value' => 'contact@example.com',
            ),
            15 => 
            array (
                'details' => NULL,
                'display_name' => 'Facebook',
                'group' => 'Social',
                'id' => 17,
                'key' => 'social.facebook',
                'order' => 12,
                'type' => 'text',
                'value' => '#',
            ),
            16 => 
            array (
                'details' => NULL,
                'display_name' => 'Twitter',
                'group' => 'Social',
                'id' => 18,
                'key' => 'social.twitter',
                'order' => 13,
                'type' => 'text',
                'value' => '#',
            ),
            17 => 
            array (
                'details' => NULL,
                'display_name' => 'Youtube',
                'group' => 'Social',
                'id' => 19,
                'key' => 'social.youtube',
                'order' => 14,
                'type' => 'text',
                'value' => '#',
            ),
            18 => 
            array (
                'details' => NULL,
                'display_name' => 'Instagram',
                'group' => 'Social',
                'id' => 20,
                'key' => 'social.instagram',
                'order' => 15,
                'type' => 'text',
                'value' => '#',
            ),
            19 => 
            array (
                'details' => NULL,
                'display_name' => 'Sistema en Mantenimiento',
                'group' => 'Configuracion',
                'id' => 29,
                'key' => 'configuracion.maintenance',
                'order' => 16,
                'type' => 'checkbox',
                'value' => '0',
            ),
        ));
        
        
    }
}