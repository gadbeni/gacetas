<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Point the publications BREAD to the custom controller so its
     * create/store/edit/update use StorageController + the custom view.
     */
    public function up()
    {
        DB::table('data_types')
            ->where('slug', 'publications')
            ->update(['controller' => 'App\\Http\\Controllers\\Admin\\PublicationController']);
    }

    public function down()
    {
        DB::table('data_types')
            ->where('slug', 'publications')
            ->update(['controller' => '']);
    }
};
