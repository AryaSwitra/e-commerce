<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = "sliders";
    protected $primarykey = "id";

    protected $filllable = [
    	"title","foto","active","uploader",
    ];
}
