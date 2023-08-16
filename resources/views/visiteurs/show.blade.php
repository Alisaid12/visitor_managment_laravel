@extends('dashboard')

@section('content')
 <div class="container " style="border-radius:25px;">
    <h2 style="text-align: center; border: 2px ; color:white"> <b>Visiter Information</b> </h2>
    <div class="row justify-content-center align-items-center bordered">
            <div class="card">
                <div class="card-header">
                    <h2><b>{{$visiteurs->nom}} {{$visiteurs->prenom}}</b></h2>
                    Visiteur Page
                </div>
                    <div class="card-body" >
                        <div class=" flex-row align-items-center"><h4>Date : </h4><h6> {{$visiteurs->date}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Nom :  </h4><h6> {{$visiteurs->nom}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Prenom :  </h4><h6> {{$visiteurs->prenom}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> CIN : </h4> <h6>{{$visiteurs->cin}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Email : </h4> <h6>{{$visiteurs->email}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Phone Number : </h4> <h6>{{$visiteurs->tele}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Ville : </h4> <h6>{{$visiteurs->ville}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Résponsable Nom : 
                                            </h4>   @foreach(\App\Models\User::where('type', 'responsable')->pluck('name', 'id') as $id => $name)
                                
                                                <h6 value="{{ $id }}">{{ $name }} </p>
                                             @endforeach</h6></div>
                       
                        <div class=" flex-row align-items-center"><h4> Objet Visite : </h4> <h6>{{$visiteurs->objet_visite}}</h6></div>
                        <div class=" flex-row align-items-center"><h4> Satisfaction Visiteur : </h4> <h6>{{$visiteurs->satisfaction}}</h6></div>
                        <a href="{{route('visiteur.index')}}" >
                            <button class="btn btn-primary mb-1" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Retourn</button>
                        </a>
                    </div>
            </div>
    </div>        
</div> 
@endsection
