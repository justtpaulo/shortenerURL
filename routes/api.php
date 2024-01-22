<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenerController;
use App\Http\Controllers\AuthController;

Route::post("/shorten", [ShortenerController::class, "shortenLink"]);

?>