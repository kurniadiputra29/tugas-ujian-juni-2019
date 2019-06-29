<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    protected $table = "debts";

    protected $fillable = ["members_id", "item_id", "tgl_pinjam", "tgl_kembali", "jumlah","denda", "keterangan"];

    public function members()
    {
    	return $this->belongsTo(Member::class);
    }
    public function item()
    {
    	return $this->belongsTo(Item::class);
    }
}
