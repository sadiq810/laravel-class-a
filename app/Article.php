<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $table = 'articles';
    protected $guarded = ['id'];

    //protected $fillable = [];

   /* public function user()
    {
        //return User::find($this->user_id);
        return $this->belongsTo(User::class, 'user_id', 'id');
    }*/
}
