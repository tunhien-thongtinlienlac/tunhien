<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taikhoan extends Model
{
	protected $connection = 'lar_tunhien';
    protected $table = 'taikhoan';
    protected $fillable = ['id','name_tk','matkhau'];
}
