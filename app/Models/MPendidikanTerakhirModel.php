<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MPendidikanTerakhirModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "m_pendidikan_terakhir";
    protected $guarded = ["id"];

    public function m_pendidikan_terakhir() {
        return $this->hasMany( KeluargaKlienModel::class ,'id_m_pendidikan_terakhir');
    }
    
}

