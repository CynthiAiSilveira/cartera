<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    protected  $table = 'cheques';

    protected $primaryKey = 'id_cheque';

    protected $fillable = [
        'fecha_creacion',
        'cantidad',
        'id_beneficiario',
        'cantidad_letra',
    ];

    // If you don't have this, add it:public $timestamps = false; 
    

    public function beneficiario()
        {
            return $this->belongsTo(Beneficiario::class, 'id_beneficiario');
        }
}
