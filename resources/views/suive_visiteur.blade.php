@extends('dashboard')


@section('content')
    <form action="{{ route('visit.store', ['id' => $visit->id, 'visiteur_id' => $visit->visiteur->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label for="compte_rendue" class="mt-3">Compte Rendu:</label>
            <textarea class="form-control @error('compte_rendue') is-invalid @enderror" id="compte_rendue" name="compte_rendue"
                rows="5">{{ old('compte_rendue') }}</textarea>
            @error('compte_rendue')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="plan_visit_prochaine" class="mt-3">Plan de prochaine visite :</label>
            <textarea class="form-control @error('plan_visit_prochaine') is-invalid @enderror" id="plan_visit_prochaine"
                name="plan_visit_prochaine" rows="5">{{ old('plan_visit_prochaine') }}</textarea>
            @error('plan_visit_prochaine')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label for="date_visit_prochaine" class="mt-3">Date de prochaine visite :</label>
            <input type="date" class="   @error('date_visit_prochaine') is-invalid @enderror" id="date_visit_prochaine"
                name="date_visit_prochaine" value="{{ old('date_visit_prochaine') }} ">
            @error('date_visit_prochaine')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group mb-3 text-center">
            <input type="hidden" name="hidden_id" value="">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
@endsection
