<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Models\Visit; 

use Illuminate\Http\Request;
use App\Models\SuivieVisiteur;
use Illuminate\Support\Facades\DB;


class SuivieVisiteurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($id){
        $visiteur = Visiteur::find($id);
        $visits= $visiteur->visits;
        $suive_visiteurs=DB::table('suivie_visiteurs')
        ->select('suivie_visiteurs.*')
        ->where('visiteur_id' ,'LIKE', "$id%")
        ->get();
        return view('visitor')->with(compact('visiteur','visits','suive_visiteurs'));
    }
    

    public function edit($id)
    {
        
        // Find the visit by ID
        $visit = Visit::find($id);
        $visiteur=$visit->visiteur;
    
        // Check if the visit was found
        if (!$visit) {
            // Redirect back with an error message if visit not found
            return redirect()->back()->with('error', 'Visit not found');
        }
    
        // Return the edit view with the visit data
        return view('suive_visiteur')->with(compact('visit' ,'visiteur'));
    }
    
    public function store(Request $request, $id)
    {
        $visit = Visit::find($id);
        
        $visiteur=$visit->visiteur; 
        
        $validatedData = $request->validate([
            'compte_rendue' => 'required|string|max:255',
            'plan_visit_prochaine' => 'required|string|max:255',
            'date_visit_prochaine' => 'required|date',
        ]);
        
        SuivieVisiteur::create([
            'compte_rendue' => $validatedData['compte_rendue'],
            'plan_visit_prochaine' => $validatedData['plan_visit_prochaine'],
            'date_visit_prochaine' => $validatedData['date_visit_prochaine'],
            'visiteur_id' =>  $visiteur->id,
            'user_id' => auth()->id(),
            'visit_id' => $visit->id,
        ]);
        Visit::where('id', $visit->id)->update([
            'description' => $validatedData['compte_rendue'],
        ]);
        
        
        return redirect()->route('visitors.index', $visiteur->id)->with('success', 'Le visiteur a été enregistré avec succès.');
    }
    
    
    

}