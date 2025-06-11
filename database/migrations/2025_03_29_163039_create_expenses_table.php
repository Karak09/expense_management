<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
{
    Schema::create('expenses', function (Blueprint $table) {
        $table->id();
        $table->date('date');
        $table->string('meal_expense');
        $table->integer('meal_expense_rupees');
        $table->string('extra_expense');
        $table->integer('extra_expense_rupees');
        $table->integer('water_expense');
        $table->integer('list_of_meal');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}





// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('expenses', function (Blueprint $table) {
//             $table->id();
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('expenses');
//     }
// };
