<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Komoditas extends Model
{
    protected $fillable = ['name', 'jenis', 'harga', 'status', 'id_surveyor'];
    public $timestamps = \true;
}
