<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OriginalLink extends Model {
    protected $table = 'OriginalLink';
    protected $primaryKey = 'idOriginalLink';
    protected $fillable = ['OriginalURL'];

    public function shortenedLink() {
        return $this->hasOne(Shortenedlink::class, 'idOriginalLink');
    }
}
