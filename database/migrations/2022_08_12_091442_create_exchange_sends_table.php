<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'exchange_sends',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('receiver_id')
                    ->constrained('centers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->foreignId('transmitter_id')
                    ->constrained('centers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
                $table->boolean('is_new');
                $table->boolean('acceptance_status')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchange_sends');
    }
};
