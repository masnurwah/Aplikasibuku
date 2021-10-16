<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $primaryKey = 'id';

    protected $fillable = [
        'penulis_id',
        'image',
        'judul_buku'
    ];
    public function penulis()
    {
		return $this->belongsTo(Penulis::class, 'penulis_id', 'id');
    }
}
