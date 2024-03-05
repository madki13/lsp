<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penerbangan;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function listTransaksi(){
        return $this->belongsTo(penerbangan::class,'penerbangan_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
