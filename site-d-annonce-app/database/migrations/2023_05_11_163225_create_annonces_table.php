<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->boolean('availability');
            $table->date('date_depot');
            $table->integer('nb_vue');
            $table->string('heure_depot');



            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onDelete('cascade');

                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
    
    
                $table->unsignedBigInteger('categorie_id');
                $table->foreign('categorie_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
            });

            
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
