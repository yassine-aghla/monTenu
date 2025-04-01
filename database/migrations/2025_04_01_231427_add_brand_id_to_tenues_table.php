<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tenues', function (Blueprint $table) {
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('tenues', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
        });
    }
};
