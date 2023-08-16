<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = ['date', 'objet_visite', 'id_visiteur' ,'responsable_id'];


    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'id_visiteur');
    }
    public function suive_visiteur()
    {
        return $this->belongsTo(Visiteur::class, 'visit_id');
    }
    public function user()
    {
        return $this->belongsTo(Visiteur::class, 'responsable_id');
    }
    
    
}