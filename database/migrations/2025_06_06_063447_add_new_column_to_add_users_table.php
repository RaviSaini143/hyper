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
        Schema::table('add_users', function (Blueprint $table) {
           $table->string('user_type')->nullable()->default('user')->after('zipcode');
           $table->string('status')->nullable()->default('0')->after('zipcode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('add_users', function (Blueprint $table) {
            $table->dropColumn('user_type');
             $table->dropColumn('status');
        });
    }
};
