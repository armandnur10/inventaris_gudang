<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submission';
    protected $guarded = [''];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'id_barang');
    }
}
