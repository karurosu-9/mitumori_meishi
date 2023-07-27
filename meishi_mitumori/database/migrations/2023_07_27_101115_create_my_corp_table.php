<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_corp', function (Blueprint $table) {
            $table->id();
            $table->string('corp_name', 50)->nullable(false);
            $table->string('postal_code', 7)->nullable(false);
            $table->string('address', 100)->nullable(false);
            $table->string('tel', 13)->nullable(false);
            $table->string('fax')->nullable(false);
            $table->string('place', 50)->nullable(false);
            $table->string('conditions', 50)->nullable(false);
            $table->string('deadline', 50)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_corp');
    }
};
