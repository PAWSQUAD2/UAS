<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $data = ['deleted_at'];
    protected $table = 'comment';
    protected $primaryKey = 'id';
    public $timestamp = true;
    protected $fillable = ['id_user','id_berita',
                            'isi'];

}
