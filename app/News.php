<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = ['judul','isi',
                            'photoUrl','kategori'];
}
