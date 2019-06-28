<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected $fillable = ["category_id", "judul", "kode", "pengarang", "penerbit", "harga_beli", "tanggal_beli", "total", "keterangan"];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
