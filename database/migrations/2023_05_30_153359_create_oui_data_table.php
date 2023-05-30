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
        Schema::create('oui_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Registry');
            $table->string('Assignment');
            $table->string('OrganizationName');
            $table->string('OrganizationAddress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oui_data');
    }
};
