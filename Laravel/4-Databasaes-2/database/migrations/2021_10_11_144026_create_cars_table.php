<?php

    use App\Models\Make;
    use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->foreignIdFor(Make::class, 'make_id')->constrained(); //forein key
            $table->integer('year');

        /*ANOTHER WAY TO CREATE A FOREIN KEY
         *  $table->integer('make_id');
         *  $table->foreign('make_id')
         *          ->references('id')
         *          ->on('makes')
         *          ->onDelete('cascade');
         */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
