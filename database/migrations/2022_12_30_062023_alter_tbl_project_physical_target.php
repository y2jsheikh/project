<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTblProjectPhysicalTarget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_project_physical_target', function (Blueprint $table) {
            $table->dropColumn('physical_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_project_physical_target', function (Blueprint $table) {
            $table->string('physical_description', 20)->default(null)->nullable();
        });
    }
}
