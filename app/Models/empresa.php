<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Elonquent\SoftDeletes;

class empresa extends Model
{
    //use HasFactory, SoftDeletes;
    use HasFactory;

    protected $table = 'empresas';
    
    //protected $dates = ['deleted_at'];
    
    //public $timestamps = 'true';

    protected $fillable = [
        'empresa',
        'telefone',
        'email',
        'localizacao',
        'data_contrato',
        'nuit',
        'descricao',
        'tipo_empresa',
        'tipo',
        'url',
        'informacao',
    ];
}