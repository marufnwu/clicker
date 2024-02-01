<?php

use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("phone", 14);
            $table->enum("gender", User::$gender);
            $table->string("area", 50);
            $table->integer("refer_by")->nullable();
            $table->string("refer_code", 6);
            $table->integer("status")->default(1);
            $table->integer("role")->default(1);
            $table->integer("level");
            $table->timestamp("last_active")->default(now());
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
