<?php

namespace App\Http\Controllers;

use App\Models\Visiteur;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Collection;
use App\Notifications\AddVisit;
use Illuminate\Support\Facades\DB;

use DataTables;



class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $visiteurs = Visiteur::all(); // Retrieve all 'visiteurs' from the database

        // return DataTables::of($visiteurs)
        //     ->make(true);
        return view('visiteurs.index' , compact('visiteurs') );
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        return view('visiteurs.create');
    }
   
   
    

   
    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $data = $request->validate([
             'date' => 'required|date',
             'nom' => 'required|string',
             'prenom' => 'required|string',
             'cin' => 'required|string',
             'organisme' => 'required|string',
             'genre' => 'nullable|string',
             'email' => 'required|email',
             'tele' => 'required',
             'ville' => 'nullable|string',
             'responsable_id' => 'required|string',
             'objet_visite' => 'required|string|max:255|', // Update with your actual choices
             'satisfaction' => 'required|string',
         ]);
     
         $visiteur = Visiteur::where('cin', $request->input('cin'))->first();
     
         if ($visiteur) {
             // Update existing Visiteur
             $visiteur->update($data);
         } else {
             // Create new Visiteur
             $visiteur = Visiteur::create($data);
         }
     
         // Create new Visit for the Visiteur
         Visit::create([
             'date' => $visiteur->date,
             'id_visiteur' => $visiteur->id,
             'responsable_id' => $visiteur->responsable_id,
             'objet_visite' => $visiteur->objet_visite,
         ]);
     
         $user_create = auth()->user()->name;
         $responsable = User::find($visiteur->responsable_id);
         if ($responsable) {
             Notification::send($responsable, new AddVisit($visiteur->id, $user_create, $visiteur));
         }
     
     
   
         return redirect('visiteur')->with('flash_message','Visiteur Ajouter avec Succées');
     }
        

    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $visiteurs = Visiteur::findOrFail($id);
        return view('visiteurs.show')->with('visiteurs',$visiteurs);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visiteur = Visiteur::findOrFail($id);
        return view('visiteurs.edit')->with('visiteurs',$visiteur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $visiteur = Visiteur::findOrFail($id);
        $data = $request->validate([
            'date' => 'required|date',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'cin' => 'required|string',
            'organisme' => 'required|string',
            'genre' => 'nullable|string',
            'email' => 'required|email',
            'tele' => 'required',
            'ville' => 'nullable|string',
            'responsable_id' => 'required|string',
            'objet_visite' => 'required|string|max:255|', // Update with your actual choices
            
         ]);
            
        $visiteur->update($data);
        $visiteur->visits()->update([
            'date' => $data['date'],
            'objet_visite' => $data['objet_visite'],
        ]);
        // $user_create = auth()->user()->name;
        // $responsable = User::find($data['responsable_id']);
        // if($responsable) {
        //     Notification::send($responsable , new AddVisit($visiteur->id,$user_create, $visiteur));
        // }
        
        // else {
         
        //     Notification::send($responsable , new AddVisit($visiteur->id,$user_create, $visiteur));

        // }
        return redirect('visiteur')->with('falsh_message','Visiteur Modifier Avec Succéss');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visiteur = Visiteur::findOrFail($id);
        $visiteur->delete();
    
        return redirect('visiteur')->with('alert_message','Visiteur Supprimer Avec Succéss');
    }
   
   
    public function info_visiteur($id){
        
        $visiteur = Visiteur::find($id);
        
        $visits= $visiteur->visits;
        
        $suive_visiteurs=DB::table('suivie_visiteurs')
        
        ->select('suivie_visiteurs.*')
        
        ->where('visiteur_id' ,'LIKE', "$id%")
        
        ->get();
        return view('info_visiteur')->with(compact('visiteur','visits','suive_visiteurs'));
    }



    public function getVisiteur($cin) 
    {
        $visitor = Visiteur::where('cin', $cin)->first();
        
        if ($visitor) {
            return $visitor;
        }
    }


       

  
}
  

   