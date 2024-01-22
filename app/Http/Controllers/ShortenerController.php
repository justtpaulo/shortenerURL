<?php

namespace App\Http\Controllers;

use App\Models\OriginalLink;
use App\Models\ShortenedLink;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class ShortenerController extends Controller {
    public function shortenLink(Request $request) {
        try {
            $request->validate([
                "url" => "required|url",
            ], [
                "url.required" => "O campo URL é obrigatório.",
                "url.url" => "Por favor, insira uma URL válida."
            ]);
        } catch (ValidationException $e) {
            return response()->json(["error" => $e->errors()], 400);
        }

        $originalLink = OriginalLink::create(["OriginalURL" => $request->input("url")]);

        $code = $this->generateUniqueCode(5);

        $shortenedLink = ShortenedLink::create([
            "ShortenedURL" => url($code),
            'idOriginalLink' => $originalLink->idOriginalLink
        ]);

        return response()->json(["code" => $shortenedLink->ShortenedURL]);
    }

    public function redirectLink($code) {
        $shortenedLink = ShortenedLink::where("ShortenedURL", url($code))->first();

        if ($shortenedLink) {
            return redirect($shortenedLink->OriginalLink->OriginalURL);
        }

        return redirect("/");
    }

    private function generateUniqueCode($length) {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $code = "";
    
        do {
            $code = "";
    
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
        } while ($this->codeExistsInCache($code));
    
        $this->storeCodeInCache($code);
    
        return $code;
    }
    
    private function codeExistsInCache($code) {
        return Cache::has("shortenedCode:" . $code);
    }
    
    private function storeCodeInCache($code) {
        Cache::put("shortenedCode:" . $code, true, 60);
    }
}
