<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectFieldTblPhysicalTargetStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table('tbl_physical_target_status', function (Blueprint $table) {
            $table->string('project')->nullable()->after('project_id')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table('tbl_physical_target_status', function (Blueprint $table) {
            $table->dropColumn('project');
        });
    }
}
