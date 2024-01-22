<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenerController;

Route::get("/", function () {
    return view("home");
});

Route::get("/{code}", [ShortenerController::class, "redirectLink"]);

?>