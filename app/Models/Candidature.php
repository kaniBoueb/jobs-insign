<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function Offre(){
        return $this->belongsTo(Offre::class, 'offre_id', 'id');
    }

    public function Process(){
        return $this->belongsTo(Processus::class, 'process_id', 'id');
    }
}
