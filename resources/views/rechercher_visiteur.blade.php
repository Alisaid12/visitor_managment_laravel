@extends('dashboard')

@section('content')
    <style>
        #visiteur-fields input {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        #responsable-fields select {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .info {

            border: 2px solid blue;
            color: #fff;
            background-color: #5bc0de;
            border-color: #46b8da;
            padding: 6px 12px;
            margin-bottom: 0;
            cursor: pointer;
            font-size: 14px;
            font-weight: 400px;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
            text-decoration: none;
        }

        .info:hover,
        .info:focus {
            color: #fff;
            background-color: #31b0d5;
            border-color: #269abc;
        }

        .info:active,
        .info.active {
            background-color: #31b0d5;
            border-color: #269abc;
        }

        input[type="date"] {
            display: block;
            position: relative;
            padding: 1rem 3.5rem 1rem 0.75rem;

            font-size: 1rem;
            font-family: monospace;

            border: 1px solid #8292a2;
            border-radius: 0.25rem;
            background: white url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='22' viewBox='0 0 20 22'%3E%3Cg fill='none' fill-rule='evenodd' stroke='%23688EBB' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' transform='translate(1 1)'%3E%3Crect width='18' height='18' y='2' rx='2'/%3E%3Cpath d='M13 0L13 4M5 0L5 4M0 8L18 8'/%3E%3C/g%3E%3C/svg%3E") right 1rem center no-repeat;

            cursor: pointer;
        }

        input[type="date"]:focus {
            outline: none;
            border-color: #3acfff;
            box-shadow: 0 0 0 0.25rem rgba(0, 120, 250, 0.1);
        }

        ::-webkit-datetime-edit {}

        ::-webkit-datetime-edit-fields-wrapper {}

        ::-webkit-datetime-edit-month-field:hover,
        ::-webkit-datetime-edit-day-field:hover,
        ::-webkit-datetime-edit-year-field:hover {
            background: rgba(0, 120, 250, 0.1);
        }

        ::-webkit-datetime-edit-text {
            opacity: 0;
        }

        ::-webkit-clear-button,
        ::-webkit-inner-spin-button {
            display: none;
        }

        ::-webkit-calendar-picker-indicator {
            position: absolute;
            width: 2.5rem;
            height: 100%;
            top: 0;
            right: 0;
            bottom: 0;

            opacity: 0;
            cursor: pointer;

            color: rgba(0, 120, 250, 1);
            background: rgba(0, 120, 250, 1);
        }

        input[type="date"]:hover::-webkit-calendar-picker-indicator {
            opacity: 0.05;
        }

        input[type="date"]:hover::-webkit-calendar-picker-indicator:hover {
            opacity: 0.15;
        }
    </style>

    <div class="">
        <form method="GET" action="{{ route('recherche') }}">
            <div class="mb-2">
                <u>
                    <h2>Recherche visite:</h2>
                </u>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="global" name="recherche_type" value="global">
                <label class="form-check-label mb-3" for="global">Total</label>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="date" name="recherche_type" value="date">
                <label class="form-check-label" for="date">Date</label>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="visiteur" name="recherche_type" value="visiteur">
                <label class="form-check-label" for="visiteur">Visiteur</label>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="responsable" name="recherche_type" value="responsable">
                <label class="form-check-label" for="responsable">Responsable</label>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="objet_visite" name="recherche_type" value="objet_visite">
                <label class="form-check-label" for="objet_visite">Objet Visite</label>
            </div>
            <div class="form-check" style="display: inline-block;">
                <input type="radio" class="form-check-input" id="periode" name="recherche_type" value="periode">
                <label class="form-check-label" for="periode">Periode</label>
            </div>

            <div id="dateInput" style="display: none;">
                <input type="date" class="form-control mb-2" name="date" style="width: 30%;">
            </div>


            <div id="visiteur-fields" style="display: none;">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"
                    style="width: 30%;">
                @if ($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif

                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"
                    style="width: 30%;">
                @if ($errors->has('prenom'))
                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                @endif

                <input type="text" class="form-control" id="cin" name="cin" placeholder="CIN"
                    style="width: 30%;">
                @if ($errors->has('cin'))
                    <span class="text-danger">{{ $errors->first('cin') }}</span>
                @endif

                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone"
                    style="width: 30%;">
                @if ($errors->has('telephone'))
                    <span class="text-danger">{{ $errors->first('telephone') }}</span>
                @endif

                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                    style="width: 30%;">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif

                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville"
                    style="width: 30%;">
                @if ($errors->has('ville'))
                    <span class="text-danger">{{ $errors->first('ville') }}</span>
                @endif

                <input type="text" class="form-control" id="organisme" name="organisme" placeholder="Organisme"
                    style="width: 30%;">
                @if ($errors->has('organisme'))
                    <span class="text-danger">{{ $errors->first('organisme') }}</span>
                @endif

            </div>



            <div id="responsable-fields" style="display: none;">
                <select class="form-select" aria-label="Default select example" name="responsable" style="width: 30%;">
                    <option selected>Choisir un Responsable</option>
                    @foreach (\App\Models\User::where('type', 'responsable')->pluck('name', 'id') as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                {{-- <label for="">Date début</label><input type="date" class="form-control" name="date_debut"
                    style="width: 30%;" placeholder="Date début">
                <label for="">Date fin</label><input type="date" class="form-control mb-2"
                    name="date_fin" style="width: 30%;" placeholder="Date fin"> --}}


            </div>
            <div id="periode-fields" style="display: none;">

                <label for="">Date début</label><input type="date" class="form-control" name="date_debut"
                    style="width: 30%;" placeholder="Date début">
                <label for="">Date fin</label><input type="date" class="form-control mb-2" name="date_fin"
                    style="width: 30%;" placeholder="Date fin">


            </div>
            <div id="objet-visite-fields" style="display: none;">

                <select class="form-select mb-2" aria-label="Default select example" name="objet_visite"
                    style="width: 30%;">
                    <option selected>Choisir une Objet de visit</option>
                    @foreach (\App\Models\Visiteur::select('objet_visite')->distinct()->get() as $visiteur)
                        <option value="{{ $visiteur->objet_visite }}">{{ $visiteur->objet_visite }}</option>
                    @endforeach
                </select>

            </div>




            <div class="form-group mb-3 ">
                {{-- <input type="hidden" name="hidden_id" value=""> --}}
                <input type="submit" class="btn btn-primary mb-3 " value="Filtre">
            </div>

        </form>





        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0"><i>Liste Visites :</i> </h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    {{-- <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a> --}}
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Nom complet</th>
                                    <th class="border-bottom-0">Date</th>
                                    <th class="border-bottom-0">CIN</th>
                                    <th class="border-bottom-0">Email</th>
                                    {{-- <th class="border-bottom-0">Tele</th>
                                    <th class="border-bottom-0">Ville</th> --}}
                                    <th class="border-bottom-0">Organisme</th>
                                    <th class="border-bottom-0">Responsable</th>
                                    <th class="border-bottom-0">Objet Visite</th>
                                    <th class="border-bottom-0">Actions</th>
                                    <th class="border-bottom-0"></th>




                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visiteurs as $item)
                                    <tr>
                                        <td>{{ $item->nom }} {{ $item->prenom }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($item->date)) }}</td>
                                        <td>{{ $item->cin }}</td>
                                        <td>{{ $item->email }}</td>
                                        {{-- <td>(+212){{ $item->tele }}</td> --}}
                                        {{-- <td>{{ $item->ville }}</td> --}}
                                        <td>{{ $item->organisme }}</td>
                                        @if ($user = \App\Models\User::find($item->responsable_id))
                                            <td>{{ $user->name }}</td>
                                        @else
                                            <td>Unknown</td>
                                        @endif
                                        <td>{{ $item->objet_visite }}</td>

                                        <td>
                                            <a href="{{ url('/info_visitor/' . $item->id) }}" title="View Visiteur"
                                                class="info">
                                                <i class="fa fa-eye" aria-hidden="true"></i>Info
                                            </a>

                                        </td>
                                        <td></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- row closed -->
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    <!-- Internal Data tables -->
    <script src="{{ URL::asset('js/filter.js') }}"></script>
    <script src="{{ URL::asset('js/filter.css') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('js/table-data.js') }}"></script>



    {{--
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>CIN</th>
                            <th>Email</th>
                            <th>Tele</th>
                            <th>Ville</th>
                            <th>Organisme</th>
                            <th>Résponsable</th>
                            <th>Objet Visite</th>
                            <th>Satisfaction</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visiteurs as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->nom }}</td>
                                <td>{{ $item->prenom }}</td>
                                <td>{{ $item->cin }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->tele }}</td>
                                <td>{{ $item->ville }}</td>
                                <td>{{ $item->organisme }}</td>
                                @if ($user = \App\Models\User::find($item->responsable_id))
                                    <td>{{ $user->name }}</td>
                                @else
                                    <td>Unknown</td>
                                @endif
                                <td>{{ $item->objet_visite }}</td>
                                <td>{{ $item->satisfaction }}</td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> --}}
@endsection
