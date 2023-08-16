<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\Visit;

class FilterVisiteur extends Controller
{

  
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function rechercheVisiteur(Request $request){
      
       
        $visiteurs = Visiteur::query();
      
                        if ($request->has('recherche_type')) {
                            $visiteurs->orderBy('nom');
                        }
                        
                        if ($request->has('recherche_type')) {
                            $date = $request->input('date');
                            if (!empty($date)) {
                                $visiteurs->where('date','like' ,'%'. $date.'%');                            }
                            
                            
                        }
                        
                        if ($request->has('recherche_type')) {
                            $nom = $request->input('nom');
                            $prenom = $request->input('prenom');
                            $cin = $request->input('cin');
                            $telephone = $request->input('telephone');
                            $email = $request->input('email');
                            $ville = $request->input('ville');
                            $organisme = $request->input('organisme');
                            
                            if (!empty($nom)) {
                                $visiteurs->where('nom', 'like', '%' . $nom . '%');
                            }
                            
                            if (!empty($prenom)) {
                                $visiteurs->where('prenom', 'like', '%' . $prenom . '%');
                            }
                            
                            if (!empty($cin)) {
                                $visiteurs->where('cin', 'like', '%' . $cin . '%');
                            }
                            
                            if (!empty($telephone)) {
                                $visiteurs->where('tele', 'like', '%' . $telephone . '%');
                            }
                            
                            if (!empty($email)) {
                                $visiteurs->where('email', 'like', '%' . $email . '%');
                            }
                            
                            if (!empty($ville)) {
                                $visiteurs->where('ville', 'like', '%' . $ville . '%');
                            }
                            
                            if (!empty($organisme)) {
                                $visiteurs->where('organisme', 'like', '%' . $organisme . '%');
                            }
                        }
                        if ($request->has('recherche_type')) {
                            $responsable = $request->input('responsable');
                            $objet_visite = $request->input('objet_visite');
                            $service = $request->input('service');
                        
                            if (!empty($responsable) && $responsable != 'Choisir un Responsable') {
                                $visiteurs->where('responsable_id', $responsable);
                            }
                        
                            if (!empty($objet_visite) && $objet_visite != 'Choisir une Objet de visit') {
                                $visiteurs->where('objet_visite', $objet_visite);
                            }

                            
                            
                            
                            if ($request->has('date_debut') && $request->has('date_fin')) {
                                $dateDebut = $request->input('date_debut');
                                $dateFin = $request->input('date_fin');
                            
                                if (!empty($dateDebut) && !empty($dateFin)) {
                                    $visiteurs->whereBetween('created_at', [$dateDebut, $dateFin]); 
                                       
                                
                                } elseif (!empty($dateDebut)) {
                                    $visiteurs->where('created_at', '>=', $dateDebut);
                                } elseif (!empty($dateFin)) {
                                    $visiteurs->where('created_at', '<=', $dateFin);
                                }
                            }
                       
         }
         $visiteurs = $visiteurs->paginate(20);
         return view('rechercher_visiteur', compact('visiteurs'));

    
            
    }
} 