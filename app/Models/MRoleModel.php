<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MRoleModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'm_role';
    protected $softCascade = [];
    protected $guarded = [
        'id','created_at', 'updated_at', 'deleted_at',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function m_user() {
        return $this->hasMany( MUserModel::class ,'id_role');
    }

}
