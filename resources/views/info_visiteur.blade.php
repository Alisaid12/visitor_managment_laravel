@extends('dashboard')


@section('content')
    <h2 class="mt-3">Information des visiteurs :</h2>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Visiteur </th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>CIN</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Ville</th>
                <th>Résponsable</th>
                <th>Satisfaction</th>

            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($visiteurs as $visiteur) --}}
            @foreach ($visiteur->visits as $visit)
                <tr>
                    @if ($loop->first)
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->id }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->nom }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->prenom }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->cin }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->email }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">(+212) {{ $visiteur->tele }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->date }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->ville }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">
                            {{ \App\Models\User::find($visiteur->responsable_id)->name }}</td>
                        <td rowspan="{{ $visiteur->visits->count() }}">{{ $visiteur->satisfaction }}</td>
                    @endif

                </tr>
                {{-- @endforeach --}}
            @endforeach
        </tbody>
    </table>
    <h2 class="mt-3">Historique de suivi des visiteurs :</h2>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID Visit</th>
                <th scope="col">Date</th>
                <th scope="col">Responsable</th>
                <th scope="col">Objet Visite</th>
                <th scope="col">Description</th>
                <th scope="col">Plan visit prochine</th>
                <th scope="col">date visit prochine</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visiteur->visits as $visit)
                <tr>
                    <td>{{ $visit->id }}</td>
                    <td>{{ $visit->date }}</td>
                    <td> {{ \App\Models\User::find($visit->responsable_id)->name }}</td>

                    <td>{{ $visit->objet_visite }}</td>
                    <td>{{ $visit->description }}</td>

                    <td>{{ $visit->plan_visit_prochaine }}</td>
                    <td>{{ $visit->date_visit_prochaine }}</td>
                    <td>
                        {{-- @if (Auth::user()->type === 'Responsable') --}}
                        <a href="{{ url('/visit/' . $visit->id . '/edit') }}">
                            <button class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Suivi
                            </button>
                        </a>
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
