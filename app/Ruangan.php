<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'barang';
    protected $guarded = [''];

    public function users()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
