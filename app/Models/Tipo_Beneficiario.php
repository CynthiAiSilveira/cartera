<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Beneficiario extends Model
{
    use HasFactory;
    protected  $table = 'tipos_beneficiarios';

    protected $primaryKey = 'id_tipo';

    public function beneficiario()
        {
            return $this->hasMany(Beneficiario::class, 'id_tipo');
        }       
}
