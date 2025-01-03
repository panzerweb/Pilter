<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;

    protected $table = "photos";

    protected $fillable = [
        "user_id",
        "file_name",
        "file_path",
        "title",
        "description",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
