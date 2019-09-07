<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Pratibha;
class CreatePratibhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pratibhas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('designation');
            $table->string('githublink');
            $table->timestamps();
        });

         Pratibha::create([
        'name'=>'Pratibha Rana',
        'designation'=>'Php Developer',
        'githublink'=>'https://github.com/Pratibharana96',

            ]);
        Pratibha::create([
            'name'=>'Pratibha Rana',
            'designation'=>'Python Developer',
            'githublink'=>'https://github.com/Pratibharana96/PythonHackerrank',
        
                ]);
                
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pratibhas');
    }
}
