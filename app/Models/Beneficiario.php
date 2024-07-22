<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected  $table = 'beneficiarios';

    protected $primaryKey = 'id_beneficiario';

    public function tipos_beneficiarios()
    {
        return $this->belongsTo(Tipo_Beneficiario::class, 'id_tipo');
    }

    public function cheque()
    {
        return $this->hasMany(Cheque::class, 'id_beneficiario');
    }

   
}
