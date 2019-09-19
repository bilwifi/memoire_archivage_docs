<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    
	protected $primaryKey = 'iddocuments';
	protected $fillable = [
        'titre', 'description', 'iddepartements','file',
    ];

    public static function scopeByDepartement($query,$iddepartements){

        return $query->where('documents.iddepartements',$iddepartements);               
    }
}
