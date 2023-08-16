<?php

namespace App\Http\Controllers;

use App\Events\WelcomeUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visiteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ChartExport;


use Charts;




class CustomAuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    
    public function index(){
        
        return view('auth.login');
    }

    
    public function custom_login(Request $request){
        
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           
            return redirect()->intended('dashboard')->withSuccess('Login');
        }
        
        
        return redirect('login')->with('error', 'Login Details are not valid');

    }
    
    public function registration(){
        
        return view('auth.registration');
    }
    
    public function custom_registration(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'departement' => 'required',
            'service' => 'required',
        ]);


        // $data =  $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'departement' => $data['departement'],
            'service' => $data['service'],
            'type' => 'Admin',
        ]);
        // if($user){
        //     event(new WelcomeUser($user)); 
        // }
        return redirect('login')->with('success', 'Registration Complete');
        // return redirect('login');

    }
    public function dashboard(){
        
        if(Auth::check())
        {

           
            $visitorToday = Visiteur::whereDate('created_at', Carbon::today())->count();
            $visitorYesterday = Visiteur::whereDate('created_at', Carbon::yesterday())->count();
            $visitorLast7Days = Visiteur::where('created_at', '>=', Carbon::today()->subDays(7))->count();
            $visitorsLastMonth = Visiteur::where('created_at', '>=', Carbon::now()->subDays((30)))->count();

            // $visitorLastMonth = Visiteur::where('created_at', '>=', Carbon::now()->subMonth()->startOfMonth())
            //                           ->where('created_at', '<=', Carbon::now()->subMonth()->endOfMonth())
            //                           ->count();
            // $startDate = Carbon::now()->subMonth()->startOfMonth();
            // $endDate = Carbon::now()->subMonth()->endOfMonth();
            // $visitorsLastMonth = Visiteur::whereBetween('created_at', [$startDate, $endDate])->count();

            
            //pie chart
            $pasSatisfaitCount = Visiteur::where('satisfaction', 'non')->count();
            $tresSatisfaitCount = Visiteur::where('satisfaction', 'oui')->count();
    

            return view('dash_respon', [
                    'visitorToday' => $visitorToday,
                    'visitorYesterday' => $visitorYesterday,
                    'visitorLast7Days'=> $visitorLast7Days,
                    'visitorsLastMonth'=> $visitorsLastMonth,
                    'pasSatisfaitCount' => $pasSatisfaitCount,
                    'tresSatisfaitCount'=> $tresSatisfaitCount,
                
                
           
        ]);
            
        }
        return redirect('login');
    }


    public function logout(){
        // Session::flush();
        Auth::logout();
        return redirect('login');
    }

    
       
    
    
}