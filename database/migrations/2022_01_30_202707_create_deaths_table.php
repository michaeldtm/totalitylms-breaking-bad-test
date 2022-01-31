<?php

use App\Models\Character;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('death_id');
            $table->foreignIdFor(Character::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('cause');
            $table->string('responsible');
            $table->string('last_words');
            $table->integer('season');
            $table->integer('episode');
            $table->integer('number_of_deaths');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deaths');
    }
}
