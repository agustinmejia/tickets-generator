<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketPrintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_prints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('game_id')->nullable()->constrained('games');
            $table->foreignId('branch_office_id')->nullable()->constrained('branch_offices');
            $table->string('type')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->smallInteger('start_number')->nullable();
            $table->smallInteger('finish_number')->nullable();
            $table->string('observations')->nullable();
            $table->string('status')->nullable('habilitado');
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
        Schema::dropIfExists('ticket_prints');
    }
}
