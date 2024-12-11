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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_id')->nullable();
            $table->string('b_date')->nullable();
            $table->string('d_date')->nullable();
            $table->string('order_no')->nullable();
            $table->string('item')->nullable();
            $table->string('pd')->nullable();
            $table->string('ld')->nullable();
            $table->string('hight')->nullable();
            $table->string('shlr')->nullable();
            $table->string('pb')->nullable();
            $table->string('lv')->nullable();
            $table->string('llb')->nullable();
            $table->string('hh')->nullable();
            $table->string('lgb')->nullable();
            $table->string('sf')->nullable();
            $table->string('hl')->nullable();
            $table->string('chl')->nullable();
            $table->string('nee_look_frock')->nullable();
            $table->string('cheast_west')->nullable();
            $table->string('long_frock')->nullable();
            $table->string('sl')->nullable();
            $table->string('s_cuts')->nullable();
            $table->string('crop_top')->nullable();
            $table->string('gare')->nullable();
            $table->string('f_neck')->nullable();
            $table->string('lehenga')->nullable();
            $table->string('close_normal_broad')->nullable();
            $table->string('threed_borders_piping')->nullable();
            $table->string('ltop')->nullable();
            $table->string('b_neck')->nullable();
            $table->string('item_m')->nullable();
            $table->string('bh')->nullable();
            $table->string('lh')->nullable();
            $table->string('nadumu')->nullable();
            $table->string('mr_item')->nullable();
            $table->string('chunnies')->nullable();
            $table->string('front_open')->nullable();
            $table->string('back_open')->nullable();
            $table->string('side_open')->nullable();
            $table->string('paded')->nullable();
            $table->string('high_neck')->nullable();
            $table->string('boat_neck')->nullable();
            $table->string('halfcollar_neck')->nullable();
            $table->string('round_neck')->nullable();
            $table->string('square_neck')->nullable();
            $table->string('v_neck')->nullable();
            $table->string('sweetheart_neck')->nullable();
            $table->string('halter_neck')->nullable();
            $table->string('collared_neck')->nullable();
            $table->string('off_shoulder_neck')->nullable();
            $table->string('cowl_neck')->nullable();
            $table->string('keyhole_neck')->nullable();
            $table->string('asymmetric_neck')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
