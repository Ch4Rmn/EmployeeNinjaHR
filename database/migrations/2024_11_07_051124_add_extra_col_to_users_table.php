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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('github_id')->nullable()->after('id');
            $table->bigInteger('employee_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('img')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('nrc_number')->unique()->nullable();
            $table->date('birthday')->nullable();
            $table->date('date_of_join')->nullable();
            $table->boolean('is_present')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn([
                'phone',
                'nrc_number',
                'birthday',
                'gender',
                'address',
                'employee_id',
                'github_id',
                'department_id',
                'date_of_join',
                'is_present',
                'img'
            ]);
        });
    }
};
