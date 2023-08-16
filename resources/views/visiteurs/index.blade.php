@extends('dashboard')

@section('content')
    <div class="table-responsive">
        <h3 class="mb-3">Liste visiteurs: </h3>
        <a type="button" class="btn btn-success mb-2" href="{{ url('/visiteur/create') }}">Ajoute
            visite</a>


            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif


        <table id="example" class="table table-striped mb-3" style="width:100%">
            <thead>
                <tr>
                    <th>Nom complet</th>
                    <th>Date</th>
                    <th>CIN</th>
                    <th>Email</th>
                    <th>Tele</th>
                    <th>Ville</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($visiteurs as $item)
                    <tr>
                        <td>{{ $item->nom }} {{ $item->prenom }}</td>
                        {{-- <td>{{ $item->date }}</td> --}}
                        <td>{{ date('Y-m-d H:i', strtotime($item->date)) }}</td>


                        <td>{{ $item->cin }}</td>
                        <td>{{ $item->email }}</td>
                        <td>(+212) {{ $item->tele }}</td>
                        <td>{{ $item->ville }}</td>
                        {{-- <td>{{ $item->responsable }}</td> --}}
                        {{-- <td>{{ $item->objet_visite }}</td> --}}
                        {{-- <td>{{ $item->satisfaction }}</td> --}}


                        <td>
                            <a href="{{ url('/info_visitor/' . $item->id) }}" title="View Visiteur">
                                <button class="btn btn-info btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i>Info
                                </button>
                            </a>
                            <a href="{{ url('/visiteur/' . $item->id . '/edit') }}" title="Modifier Visiteur">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier
                                </button>
                            </a>
                            <form action="{{ route('visiteur.destroy', $item->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $item->id }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer
                                </button>

                            </form>
                                <!-- Modal -->
                                <div class="modal fade" id="delete-modal-{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="delete-modal-{{ $item->id }}-label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete-modal-{{ $item->id }}-label">
                                                    Confirmation de suppression</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer cet élément ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                @endforeach
            </tbody>

        </table>

        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Include jQuery library -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        <!-- Include Popper.js for Bootstrap -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.0/dist/umd/popper.min.js"></script> --}}

        <!-- Include Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Add the following CSS files -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">

        <!-- Add the following JS files -->
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    </div>











  
@endsection
