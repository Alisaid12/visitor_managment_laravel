@extends('dashboard')

@section('content')



    <div class="d-flex justify-content-center mt-5  p-5" style="border-radius:25px;">

        <div class="col-1 col-md-2 col-lg-12 p-5"
            style=" background: rgb(253, 253, 253)  ;border-radius:20px; border:1px solid rgb(99, 93, 93)">

            <h4 class="modal-title" id="myModalLabel">Fiche visiteur</h4>

            <div class="modal-body">
                <form action="{{ url('visiteur/' . $visiteurs->id) }}" method="post">

                    @csrf
                    {{ csrf_field() }}
                    @method('PATCH')
                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <label for="cin">CIN:</label>
                            <input type="text" class="form-control" id="cin" name="cin"
                                value="{{ $visiteurs->cin }}" autofocus>
                            @error('cin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $visiteurs->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom"
                                value="{{ $visiteurs->nom }}">
                            @error('nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="prenom">Prenom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom"
                                value="{{ $visiteurs->prenom }}">
                            @error('prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="organisme">Organisme:</label>
                            <input type="text" class="form-control" id="organisme" name="organisme"
                                value="{{ $visiteurs->organisme }}">
                            @error('organisme')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="telephone">Telephone:</label>
                            <input type="tel" class="form-control" id="tele" name="tele"
                                value="{{ $visiteurs->tele }}">
                            @error('tele')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-sm-6 form-group">
                            <label for="ville">Ville:</label>
                            <input type="text" class="form-control" id="ville" name="ville"
                                value="{{ $visiteurs->ville }}">
                            @error('ville')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-6 form-group">
                        <label for="genre" class="mb-2">Genre:</label>
                        <div>
                            <label><input type="radio" name="genre" value="male"
                                    @if ($visiteurs->genre == 'male') checked @endif> Male</label>
                            <label><input type="radio" name="genre" value="female"
                                    @if ($visiteurs->genre == 'female') checked @endif> Female</label>
                        </div>
                        <span class="text-danger">{{ $errors->first('genre') }}</span>
                        @error('genre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            </div>
            <hr>

            <div class="modal-body">
                <h3 for="objet_visite"><u>Objet Visite:</u></h3>
                <div class="row">

                    <div class="col-sm-6 form-group">
                        <label for="responsable_id">Responsable:</label>
                        <select class="form-control mb-3" id="responsable_id" name="responsable_id">

                            @foreach (\App\Models\User::where('type', 'responsable')->pluck('name', 'id') as $id => $name)
                                <option value="{{ $id }}">{{ $name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="date">Date et Heure:</label>
                        @php
                            $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', old('date', now()->format('Y-m-d H:i:s')))->addHour();
                            $dateString = $date->format('Y-m-d\TH:i');
                        @endphp
                        <input type="datetime-local" class="form-control" id="date" name="date"
                            value="{{ $dateString }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <select class="form-control mb-2" id="objet_visite">
                            <option value="{{ $visiteurs->objet_visite }}">
                                {{ $visiteurs->objet_visite }}</option>

                            {{-- <option value="">-SELECT-</option> --}}
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
                            <label for="rendezvous_type3">Directeur</label>
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
                            <label for="documentadministratifs_type3">Attestation professionnelle</label>
                        </div>

                        <div name="objet_visite" id="guichets_type" style="display:none">
                            <input type="radio" id="guichets_type1" name="objet_visite" value="Guichets: OMPIC">
                            <label for="guichets_type1">OMPIC</label><br>
                            <input type="radio" name="objet_visite" id="guichets_type2" value="Guichets: maroc-pme">
                            <label for="guichets_type2">MAROC PME</label><br>
                            <input type="radio" name="objet_visite" id="guichets_type3"
                                value="Guichets: dar-al-moukawail">
                            <label for="guichets_type3">DAR AL MOUKAWAIL</label><br>
                            <input type="radio" name="objet_visite" id="guichets_type4" value="Guichets: ism">
                            <label for="guichets_type4">ISM</label>
                        </div>

                        {{-- <div class="form-group my-4">
        <label for="demandeInformationRadio">
            <input type="radio" name="objet_visite" id="demandeInformationRadio" value=""
                onclick="toggleDemandeInformationInput()">
            <strong>Demande d'informations :</strong>
        </label>
        <input type="text" class="form-control" id="demandeInformationInput"
            name="objet_visite_text" style="width:360px;" disabled>
    </div>

    <div class="form-group mt-2">
        <label for="autresRadio">
            <input type="radio" name="objet_visite" id="autresRadio" value=""
                onclick="toggleAutresInput()">
            <strong><u>Autres à préciser, SVP !</u></strong>
        </label><br>
        <input type="text" class="form-control" id="autresInput" name="autres_input"
            style="width:360px;" disabled>
        @error('objet_visite')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <br>
    </div> --}}
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

                </div>

                <script>
                    // var objet_visite = document.getElementById("objet_visite");
                    // var rendezvous_type = document.getElementById("rendezvous_type");
                    // var document_administratifs_type = document.getElementById("document_administratifs_type");
                    // var guichets_type = document.getElementById("guichets_type");

                    // objet_visite.addEventListener("change", function() {
                    //     if (objet_visite.value === "Rendez-vous") {
                    //         rendezvous_type.style.display = "block";
                    //     } else {
                    //         rendezvous_type.style.display = "none";
                    //     }
                    //     if(objet_visite.value === "Document-administratifs"){
                    //         document_administratifs_type.style.display = "block";
                    //     }else {
                    //         document_administratifs_type.style.display = "none";
                    //     }
                    //     if(objet_visite.value === "Guichets"){
                    //         guichets_type.style.display = "block"
                    //     }else{
                    //         guichets_type.style.display = "none"
                    //     }

                    // });
                    // const autresInput = document.querySelector("#autresInput");
                    //     const autresRadio = document.querySelector("#autresRadio");

                    //     autresInput.addEventListener("change", () => {
                    //         autresRadio.value = `Autre à préciser : ${autresInput.value}`;
                    //     });

                    //     function toggleAutresInput() {
                    //         autresInput.disabled = !autresInput.disabled;
                    //         if (!autresInput.disabled) {
                    //             autresInput.focus();
                    //         }
                    //     }
                    //     const demandeInformationInput = document.querySelector("#demandeInformationInput");
                    //     const demandeInformationRadio = document.querySelector("#demandeInformationRadio");

                    //     function toggleDemandeInformationInput() {
                    //         demandeInformationInput.disabled = !demandeInformationInput.disabled;
                    //         if (!demandeInformationInput.disabled) {
                    //             demandeInformationInput.focus();
                    //         }
                    //     }
                    //     demandeInformationInput.addEventListener("change", () => {
                    //         demandeInformationRadio.value = `Demande d'informations : ${demandeInformationInput.value}`;
                    // });
                </script>

                <script src="{{ asset('js/create_visiteur.js') }}"></script>


                {{-- <hr>
                    <div>
                        <h2 class="mb-3"><b><u>Objet Visit:</u></b></h2>
                        <div class="form-group mb-2">
                            <label>
                                <h6><u>Rendez-vous:</u></h6>
                            </label>
                            <label><input type="radio" name="objet_visite" value="Rendez-vous:president">
                                Président</label>
                            <label><input type="radio" name="objet_visite" value="Rendez-vous:vice-president">
                                Vice-Président</label>
                            <label><input type="radio" name="objet_visite" value="Rendez-vous:directeur">
                                Directeur</label>

                            <span class="text-danger">{{ $errors->first('objet_visite') }}</span>

                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="form-group mb-2">
                            <label>
                                <h6><u>Documents Administratifs:</u></h6>
                            </label>
                            <label><input type="radio" name="objet_visite"
                                    value="Documents Administratifs:attestation_professionnelle">
                                Attestation professionnelle</label>
                            <label><input type="radio" name="objet_visite"
                                    value="Documents Administratifs:carte_professionnelle"> Carte
                                professionnelle</label>
                            <label><input type="radio" name="objet_visite"
                                    value="Documents Administratifs:certificat_origine">
                                Certificat d'origine</label>
                            <span class="text-danger">{{ $errors->first('objet_visite') }}</span>

                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group mb-2">
                            <label>
                                <h6><u>Guichets:</u></h6>
                            </label>
                            <label><input type="radio" name="objet_visite" value="Guichets:OMPIC">
                                OMPIC</label>
                            <label><input type="radio" name="objet_visite" value="Guichets:MAROC_PM"> MAROC
                                PME</label>
                            <label><input type="radio" name="objet_visite" value="Guichets: AR_AL_MOUKAWIL">
                                DAR AL
                                MOUKAWIL</label>
                            <label><input type="radio" name="objet_visite" value="Guichets:ISM"> ISM</label>
                            <span class="text-danger">{{ $errors->first('objet_visite') }}</span>

                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="form-group mb-2">
                            <label>
                                <input type="radio" name="objet_visite" id="Annuaire" value="Annuaire professionnel">
                                <b><u>Annuaire professionnel</u></b>
                            </label>

                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                        </div>


                        <div class="form-group mb-2">
                            <label>
                                <input type="radio" name="objet_visite" id="reservation" value="Reservation salle">
                                <b><u>Reservation salle</u></b>
                            </label>
                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                        </div>
                        <div class="form-group mb-2">
                            <label>
                                <input type="radio" name="objet_visite" id="demandeInformationRadio" value="">
                                <b>Demande informations:</b>
                            </label>
                            <input type="text" class="form-control" id="demandeInformationInput" name="objet_visite_text" style="width:360px;" onchange="updateRadioValue1()">
                            @error('objet_visite')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <script>
                            function updateRadioValue1() {
                                var inputValue = document.getElementById("demandeInformationInput").value;
                                document.getElementById("demandeInformationRadio").value =  'Demande informations:'.inputValue;
                            }
                        </script>
                        <div class="form-group mb-2">
                            <label>
                                <input type="radio" name="objet_visite" id="autresRadio" value=""> <b><u>Autres
                                        à préciser SVP!</u></b>
                            </label><br>
                            <input type="text" class="form-control" id="autresInput" name="autres_input"
                                style="width:360px;" style="display:;" onchange="updateRadioValue()">
                            @error('objet_visite')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                        </div>

                        <script>
                            function updateRadioValue() {
                                var inputValue = document.getElementById("autresInput").value;
                                document.getElementById("autresRadio").value = inputValue;
                            }
                        </script>





                     </div>  --}}
                <hr>
                <div class="row">


                    <div class="col-sm-6 form-group">
                        <label><b> Satisfaction </b></label>
                        <label><input type="radio" name="satisfaction" value="oui"
                                @if ($visiteurs->satisfaction == 'oui') checked @endif> oui</label>
                        <label><input type="radio" name="satisfaction" value="non"
                                @if ($visiteurs->satisfaction == 'non') checked @endif> non</label>
                        <span class="text-danger">{{ $errors->first('satisfaction') }}</span>

                        @error('satisfaction')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="form-group mb-8 text-center">
                <input type="submit" class="btn btn-primary col-lg-2" value="Modifier" />
            </div>
        </div>
        </form>


        {{-- <script>
            function toggleInputField() {
                var demandeFields = document.getElementById("demande-fields");
                var demandeInformationInput = document.getElementById("demande_information_input");

                if (document.getElementById("demande_information").checked) {
                    demandeFields.style.display = "block";
                    demandeInformationInput.removeAttribute("readonly");
                } else {
                    demandeFields.style.display = "none";
                    demandeInformationInput.setAttribute("readonly", "readonly");
                }
                var demandeFields = document.getElementById("autre-fields");
                var demandeInformationInput = document.getElementById("autres_objet_visite");

                if (document.getElementById("Autres").checked) {
                    demandeFields.style.display = "block";
                    demandeInformationInput.removeAttribute("readonly");
                } else {
                    demandeFields.style.display = "none";
                    demandeInformationInput.setAttribute("readonly", "readonly");
                }
            }

            function enableInputField() {
                document.getElementById("demande_information_input").readOnly = false;
            }

            function enableInputAutre() {
                document.getElementById("Autres_input").readOnly = false;
            }
        </script> --}}





    </div>
    </div>

@stop
