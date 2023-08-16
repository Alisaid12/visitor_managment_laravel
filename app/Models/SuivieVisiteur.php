<?php

namespace App\Models;

use App\Models\User;
use App\Models\Visit;
use App\Models\Visiteur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuivieVisiteur extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'compte_rendue',
        'plan_visit_prochaine',
        'date_visit_prochaine',
        'visiteur_id',
        'user_id',
        'visit_id',
    ];


    public function visiteur()
    {
        return $this->belongsTo(Visiteur::class);
    }
   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function visit()
    {
        return $this->belongsTo(Visit::class, 'visit_id');
    }


  
//     protected static function boot()
// {
//     parent::boot();

//     static::created(function ($suivie_visiteur) {
//         Visit::where('id', $suivie_visiteur->id)->update([
//             'description' => $suivie_visiteur->compte_rendue,
//         ]);
//     });
// }

    // static::created(function ($suivie_visiteur) {
        //     $visiteur = $suivie_visiteur->visiteur;
        //     $visit = $visiteur->visits()->latest()->first();
        //     if ($visit) {
        //         $visit->description = $suivie_visiteur->compte_rendue;
        //         $visit->save();
        //     }
            
        // });
    
}