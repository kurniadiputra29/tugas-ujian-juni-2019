<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "members";

    protected $fillable = ["NIP", "name", "alamat", "status_id", "no_telp"];

    public function status()
    {
    	return $this->belongsTo(Status::class);
    }
}
