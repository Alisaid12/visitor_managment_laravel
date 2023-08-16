@extends('dashboard')

@section('content')
    <div class="d-flex justify-content-center mt-5  p-5" style="border-radius:25px;">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


        <div class="col-1 col-md-2 col-lg-12 p-5"
            style=" background: rgb(253, 253, 253)  ;border-radius:20px; border:2px solid rgb(59, 35, 35) ">

            <u>
                <h4 class="modal-title" id="myModalLabel">Fiche visiteur:<u></u></h4>
            </u>

            <div class="modal-body">
                <form method="POST" action="{{ url('visiteur') }}">
                    @csrf
                    {{ csrf_field() }}
                    <div class="row">


                        <div class="col-sm-6 form-group">
                            <label for="cin">CIN:</label>
                            <input type="text" class="form-control cin-input" id="cin" name="cin"
                                value="{{ old('cin') }}" oninput="fetchVisitorDetails(this.value)" autofocus required>


                            <!-- Add autocomplete attribute and custom class -->
                            @error('cin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <script>
                            function fetchVisitorDetails(cin) {
                                $.ajax({
                                    url: "/get_visiteurs/" + cin,
                                    success: function(visitor) {
                                        if (visitor) {
                                            $("#nom").val(visitor.nom);
                                            $("#prenom").val(visitor.prenom);
                                            $('#organisme').val(visitor.organisme);
                                            $('#tele').val(visitor.tele);
                                            $('#email').val(visitor.email);
                                            $('#ville').val(visitor.ville);
                                            if (visitor.genre === 'male') {
                                                $('#genre-male').prop('checked', true);
                                            } else if (visitor.genre === 'female') {
                                                $('#genre-female').prop('checked', true);
                                            }
                                            $('#responsable_id').val(visitor.responsable_id);

                                        }
                                    }
                                })
                            }
                        </script>
                        <div class="col-sm-6 form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ old('nom') }}" required>
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="prenom">Prenom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                value="{{ old('prenom') }}" required>
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-sm-6 form-group">
                            <label for="organisme">Organisme:</label>
                            <input type="text" class="form-control" id="organisme" name="organisme"
                                value="{{ old('organisme') }}" required>
                            @error('organisme')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="tel" class="form-control mb-1" id="tele" name="tele"
                                value="{{ old('tele') }}" required>
                            @error('tele')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-sm-6 form-group">
                            <label for="ville">Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville"
                                value="{{ old('ville') }}">
                            @error('ville')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="col-sm-6 form-group">
                        <label><b> Genre:</b></label>

                        {{-- <label><input id="genre" type="radio" name="genre" value="male"> Male</label>
                            <label><input id="genre" type="radio" name="genre" value="female"> Female</label> --}}
                        <label><input id="genre-male" type="radio" name="genre" value="male"> Male</label>
                        <label><input id="genre-female" type="radio" name="genre" value="female"> Female</label>
                        <span class="text-danger">{{ $errors->first('genre') }}</span>

                        @error('genre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <hr>



                    <div class="modal-body">
                        <u>
                            <h3 for="objet_visite">Objet visite:</h3>
                        </u>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="responsable_id">Responsable:</label>
                                <select class="form-control mb-3" id="responsable_id" name="responsable_id" required>

                                    @foreach (\App\Models\User::where('type', 'responsable')->pluck('name', 'id') as $id => $name)
                                        <option value="{{ $id }}">{{ $name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label for="date">Date et Heure:</label>
                                @php
                                    $date = \Carbon\Carbon::now()->addHour(); // Add one hour to the current date and time
                                    $dateString = $date->format('Y-m-d\TH:i');
                                @endphp
                                <input type="datetime-local" class="form-control" id="date" name="date"
                                    value="{{ $dateString }}" readonly required>
                                @error('date')
                                    <span class="text-danger mb-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <select class="form-control mb-0" name="objet_visite" id="objet_visite">
                                    <option value="">-SELECT-</option>
                                    <option value="Rendez-vous">Rendez-vous</option>
                                    <option value="Document-administratifs">Document Administratifs</option>
                                    <option value="Guichets">Guichets</option>
                                    <option value="Accompagnement">Accompagnement</option>
                                    <option value="Annuaire professionnel">Annuaire professionnelle</option>
                                    <option value="Reservation salle">Réservation salle</option>

                                </select>

                                <div name="objet_visite" id="rendezvous_type" style="display:none">
                                    <input type="radio" id="rendezvous_type1" name="objet_visite"
                                        value="Rendez-vous: Président">
                                    <label for="rendezvous_type1">Président</label><br>
                                    <input type="radio" id="rendezvous_type2" name="objet_visite"
                                        value="Rendez-vous: Vice-président">
                                    <label for="rendezvous_type2">Vice Président</label><br>
                                    <input type="radio" id="rendezvous_type3" name="objet_visite"
                                        value="Rendez-vous: Directeur">
                                    <label for="rendezvous_type3" class="mb-4">Directeur</label>
                                </div>



                                <div name="objet_visite" id="document_administratifs_type" style="display:none">
                                    <input type="radio" id="documentadministratifs_type1" name="objet_visite"
                                        value="Document-administratifs: Carte-professionnelle">
                                    <label for="documentadministratifs_type1">Carte professionnelle</label><br>
                                    <input type="radio" id="documentadministratifs_type2" name="objet_visite"
                                        value="Document-administratifs: Certificat-d'origine">
                                    <label for="documentadministratifs_type2">Certificat d' origine</label><br>
                                    <input type="radio" id="documentadministratifs_type3" name="objet_visite"
                                        value="Document-administratifs: Attestation-professionnelle">
                                    <label for="documentadministratifs_type3" class="mb-4">Attestation
                                        professionnelle</label>
                                </div>

                                <div name="objet_visite" id="guichets_type" style="display:none">
                                    <input type="radio" id="guichets_type1" name="objet_visite"
                                        value="Guichets: OMPIC">
                                    <label for="guichets_type1">OMPIC</label><br>
                                    <input type="radio" name="objet_visite" id="guichets_type2"
                                        value="Guichets: maroc-pme">
                                    <label for="guichets_type2">MAROC PME</label><br>
                                    <input type="radio" name="objet_visite" id="guichets_type3"
                                        value="Guichets: dar-al-moukawail">
                                    <label for="guichets_type3">DAR AL MOUKAWAIL</label><br>
                                    <input type="radio" name="objet_visite" id="guichets_type4" value="Guichets: ism">
                                    <label for="guichets_type4" class="mb-4">ISM</label>
                                </div>


                                <div class="form-group my-4">
                                    <label for="demandeInformationRadio">
                                        <div style="display: inline-block;">

                                            <input type="radio" name="objet_visite" id="demandeInformationRadio"
                                                value="" onclick="toggleDemandeInformationInput()">
                                            <strong><u>Demande d'informations :</u></strong>
                                    </label>
                                </div>

                                <div id="demende_input" style="display: none;">
                                    <input type="text" class="form-control" id="demandeInformationInput"
                                        name="objet_visite_text" style="width:360px;">
                                </div>
                            </div>





                            <div class="form-group mb-2">
                                <label for="autresRadio">
                                    <input type="radio" name="objet_visite" id="autresRadio" value=""
                                        onclick="toggleAutresInput()">
                                    <strong><u>Autres à préciser, SVP !</u></strong>
                                </label><br>
                                <div id="aute_input" style="display: none;">

                                    <input type="text" class="form-control" id="autresInput" name="autres_input"
                                        style="width:360px;"*>
                                    @error('objet_visite')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                            </div>

                            <script></script>




                            <hr>
                            <div class="row">


                                <div class="col-sm-6 form-group">
                                    <label><b> Satisfaction </b></label>
                                    <label><input type="radio" name="satisfaction" value="oui"> oui</label>
                                    <label><input type="radio" name="satisfaction" value="non"> non</label>
                                    <span class="text-danger">{{ $errors->first('satisfaction') }}</span>

                                    @error('satisfaction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-8 text-center">
                            <input type="submit" class="btn btn-primary col-lg-2" value="Ajouter" />
                        </div>
                    </div>
                </form>

                {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

                <script src="{{ asset('js/create_visiteur.js') }}"></script>
            @endsection
