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
        if (!Schema::hasTable('students')) {
            Schema::create('students', function (Blueprint $table) {
                $table->bigIncrements('StudentID')->primary(); // Primary key
                $table->unsignedBigInteger('UserID'); // Foreign key column
                $table->string('FirstName', 50);
                $table->string('MiddleName', 50)->nullable(); // Nullable if MiddleName is optional
                $table->string('LastName', 50);
                $table->string('Email', 255); // Set to 255 to accommodate longer emails
                $table->string('Address', 255); // Increased length to accommodate longer addresses
                $table->date('Birthdate');
                $table->string('ContactNumber', 20); // Set to 20, assuming standard phone number lengths
                $table->string('EnrollmentStatus', 50)->nullable();
               

                // Foreign key constraints
                $table->foreign('UserID')->references('UserID')->on('all_users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
