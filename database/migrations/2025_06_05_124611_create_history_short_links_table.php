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
        Schema::create('history_short_links', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->foreignIdFor(\App\Models\ShortLink::class, 'short_link_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_short_links');
    }
};
