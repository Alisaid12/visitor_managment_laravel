@extends('dashboard')

@section('content')


<h2 class="mt-3">Liste Utilisateurs</h2>
<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">
    	<li class="breadcrumb-item"><a href="/dashboard">Tableau Board</a></li>
    	<li class="breadcrumb-item active">Liste Utilisateur</li>
  	</ol>


</nav>
<div class="mt-4 mb-4">



    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col col-md-6">Liste Utilisateur</div>
				<div class="col col-md-6">
					<a href="{{ route('sub_user.add') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="user_table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Departement</th>
							<th>Service</th>
							<th>Type</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap modal for delete action -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation de la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cet utilisateur?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a href="#" class="btn btn-danger" id="deleteConfirmBtn">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){

	var table = $('#user_table').DataTable({
		processing:true,
		serverSide:true,
		ajax:"{{ route('sub_user.fetchall') }}",
		columns:[
			{
				data:'name',
				name:'name'
			},
			{
				data:'email',
				name:'email'
			},

			{
				data:'departement',
				name:'departement'
			},
			{
				data:'service',
				name:'service'
			},{
				data:'type',
				name:'type'
			},
			{
				data:'action',
				name:'action',
				orderable:false
			}
		]
	});

	$(document).on('click', '.delete', function(){

		var id = $(this).data('id');

		$('#deleteModal').modal('show');

		$('#deleteConfirmBtn').attr('href', '{{ url('sub_user/delete') }}/' + id);


	});

})
</script>
@endsection
