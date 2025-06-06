<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('post_temoignages', function (Blueprint $table) {
            $table->string('auteur')->default('Anonyme');
        });
    }

    public function down()
    {
        Schema::table('post_temoignages', function (Blueprint $table) {
            $table->dropColumn('auteur');
        });
    }
};
