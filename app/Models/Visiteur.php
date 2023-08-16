<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\suivieVisiteurs;
use App\Models\Visit;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AddVisit;



class Visiteur extends Model
{
    protected $table ='visiteurs';
    protected $primaryKey = 'id';
    protected $fillable = ['date',
                            'nom',
                            'prenom',
                            'cin',
                            'organisme', 
                            'genre', 
                            'email', 
                            'tele',
                            'ville',
                            'objet_visite',
                            'responsable_id',
                            'satisfaction'];
    public function visits()
    {
        return $this->hasMany(Visit::class ,'id_visiteur');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function suivieVisiteurs()
    {
        return $this->hasMany(SuivieVisiteur::class);
    }

    // protected static function boot()
    // {
    //     parent::boot();
    
        // static::created(function ($visiteur) {
        //     $existingVisiteur = Visiteur::where('cin', $visiteur->cin)->first();
        //     if ($existingVisiteur) {
        //         Visit::create([
        //             'date' => $visiteur->date,
        //             'id_visiteur' => $existingVisiteur->id,
        //             'objet_visite' => $visiteur->objet_visite,
        //         ]);
        //         $user_create = auth()->user()->name;
        //         $responsable = User::find($visiteur->responsable_id);
        //         if ($responsable) {
        //             Notification::send($responsable, new AddVisit($existingVisiteur->id, $user_create, $visiteur));
        //         }
        //     }
        // });
    
    //     static::updated(function ($visiteur) {
    //         Visit::where('id_visiteur', $visiteur->id)->update([
    //             'date' => $visiteur->date,
    //             'objet_visite' => $visiteur->objet_visite,
    //         ]);
    //         $user_create = auth()->user()->name;
    //         $responsable = User::find($visiteur->responsable_id);
    //         if ($responsable) {
    //             Notification::send($responsable, new AddVisit($visiteur->id, $user_create, $visiteur));
    //         }
    //     });
    // }
}
    
    