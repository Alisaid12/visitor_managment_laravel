<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visiteur;
use App\Models\Visit;
use App\Models\User;


class HomeController extends Controller
{
    
    public function index(){
        $globalVisiteurs = Visiteur::all();
        $visitsCompleted = Visit::all();
        $visiteursSatisfied = Visiteur::where('satisfaction', 'oui')->get();
        return view('home', compact('globalVisiteurs', 'visitsCompleted', 'visiteursSatisfied'));
    }
    // public function index(){
    //     return view('home');
    // }
    
    
    public function about(){
        $teamMembers = User::all();

        return view('about',compact('teamMembers'));
    }
}