<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortenedLink extends Model {
    protected $table = 'ShortenedLink';
    protected $primaryKey = 'idShortenedLink';
    protected $fillable = ['ShortenedURL', 'idOriginalLink'];

    public function originalLink() {
        return $this->belongsTo(Originallink::class, 'idOriginalLink');
    }
}
