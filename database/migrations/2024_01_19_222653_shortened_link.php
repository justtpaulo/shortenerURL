<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create("ShortenedLink", function (Blueprint $table) {
            $table->id("idShortenedLink");
            $table->text("ShortenedURL");
            $table->unsignedBigInteger("idOriginalLink");
            $table->foreign("idOriginalLink")->references("idOriginalLink")->on("OriginalLink");
            $table->timestamps();
        });
    }    

    public function down(): void {
        Schema::dropIfExists("ShortenedLink");
    }
};
