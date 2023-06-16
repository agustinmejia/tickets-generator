<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('championship')->nullable();
            $table->string('journey')->nullable();
            $table->foreignId('local_id')->nullable()->constrained('teams');
            $table->foreignId('visitor_id')->nullable()->constrained('teams');
            $table->string('location')->nullable();
            $table->smallInteger('quantity_tickets')->nullable();
            $table->datetime('datetime');
            $table->string('status')->nullable('borrador');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
