<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public $timestamps = true;
    protected $table = 'kategori';
    // protected $fillable = ['nama_kategori'];
    protected $guarded = ['id'];
}
