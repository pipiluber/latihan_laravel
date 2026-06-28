<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    public $timestamps = true;
    protected $table = 'produk';
    protected $guarded = ['id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
