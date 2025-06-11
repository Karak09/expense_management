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
        Schema::table('user', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('district');
            $table->string('pin');
            $table->string('password');
            $table->string('is_deleted');
            $table->date('created_at');
            $table->date('updated_at');
            $table->integer('operator_type');
            $table->integer('operator_type_code');
            $table->string('mobile')->unique();
            // $table->dropColumn('email'); // Remove email field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
