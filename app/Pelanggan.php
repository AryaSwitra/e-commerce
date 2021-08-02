<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table = 'pelanggans';
    protected $fillable = ['user_id','nama','email','jenis_kelamin','alamat','no_hp','password'];
}
