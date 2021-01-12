@extends('layouts.master')
@section('content')
<p class="lead text-center">Welcome <span style="font-style: italic;"> <span style="font-weight: bold"> {{ auth()->user()->name}}</span> You are Logged As <span style="font-weight: bold;">{{ auth()->user()->name}}</span></span></p>
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col"><h5>All Students</h5></div>
			<div class="col text-right">
				<a class="btn btn-primary btn-sm" href="#modalAddStudent" data-toggle="modal">Create Student</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Sl/No</th>
					<th scope="col">Student Name</th>
					<th scope="col">Email</th>
					<th scope="col">ID/Roll</th>
					<th scope="col">Session</th>
					<th scope="col">Phone Number</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody id="myTable">	

			</tbody>
		</table>
	</div>
</div>
<!-- Add Student Modal -->
<div class="modal fade" id="modalAddStudent">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Create Student</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-group" method="POST" id="myForm">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control name" name="name" >
						<span class="invalid-feedback" id="name-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control email" name="email" >
						<span class="invalid-feedback" id="email-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control password" name="password" >
						<span class="invalid-feedback" id="password-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="roll">Id/Roll</label>
						<input type="text" class="form-control roll" name="roll" >
						<span class="invalid-feedback" id="roll-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="session">Session</label>
						<input type="text" class="form-control session" name="session" >
						<span class="invalid-feedback" id="session-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="phone_number">Phone Number</label>
						<input type="text" class="form-control phone_number" name="phone_number" >
						<span class="invalid-feedback" id="phone_number-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" id="storeStudent">Add</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End -->
<!-- Edit Modal -->
<div class="modal fade" id="modalEditStudent">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Student</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-group" method="POST" id="myForm">
					<input type="hidden" class="stu_id" id="stu_id" >
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control Name" id="name" name="name" >
						<span class="invalid-feedback" id="name-feedback" role="alert"></span>
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control Email" id="email" name="email" >
						<span class="invalid-feedback" id="email-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="roll">Roll/Roll</label>
						<input type="text" class="form-control Roll" id="roll" name="roll" >
						<span class="invalid-feedback" id="roll-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="session">Session</label>
						<input type="text" class="form-control Session" id="session" name="session" >
						<span class="invalid-feedback" id="session-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<label for="phone_number">Phone Number</label>
						<input type="text" class="form-control Phone_number" id="phone_number" name="phone_number" >
						<span class="invalid-feedback" id="phone_number-feedback" role="alert"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success" id="updateStudent">Update</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End -->
@endsection
@push('scripts')
	@include('admin.script')
@endpush



