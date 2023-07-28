<?php

use App\Consts\EstimateFormCountConsts;
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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corp_id');

            $table->string('tekiyo1', 100)->nullable(false);
            $table->string('unit_price1', 50)->nullable(false);
            $table->string('quantity1', 50)->nullable(false);
            $table->string('amount1', 50)->nullable(false);
            $table->string('note1', 255)->nullable();

            //マジックナンバーを使用
            for ($i = 2; $i <= EstimateFormCountConsts::FORM_NOT_HOSOKU; $i++) {
                $table->string('tekiyo' . $i, 100)->nullable();
                $table->string('unit_price' . $i, 50)->nullable();
                $table->string('quantity' . $i, 50)->nullable();
                $table->string('amount' . $i, 50)->nullable();
                $table->string('note' . $i, 255)->nullable();
            }

            //マジックナンバーを使用
            for ($i = 1; $i <= EstimateFormCountConsts::FORM_HOSOKU; $i++) {
                $table->string('hosoku' . $i, 255)->nullable();
            }

            $table->unsignedBigInteger('total_price')->nullable(false);
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
        Schema::dropIfExists('estimates');
    }
};
