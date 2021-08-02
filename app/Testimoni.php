<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    //
    protected $table = "testimonis";
    protected $primarykey = "id";

    protected $filllable = [
    	"nama", "email", "komentar","status",
    ];
}
