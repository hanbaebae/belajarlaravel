<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluargaKlienModel extends Model
{
    use HasFactory;
    protected $table = "keluarga_klien";
    protected $guarded = ["id"];

    public function m_pendidikan_terakhir() {
        return $this->belongsTo( MPendidikanTerakhirModel::class ,'id_m_pendidikan_terakhir');
    }
}
