@extends('layouts.master')
@include('layouts.partials.navbar')
@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col"><h5>Welcome Welcome<span style="font-style: italic;"> <span style="font-weight: bold" id="name"> </span> </h5></div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Student Name</th>
					<th scope="col">Email</th>
					<th scope="col">ID/Roll</th>
					<th scope="col">Session</th>
					<th scope="col">Phone Number</th>
				</tr>
			</thead>
			<tbody>	
				<tr>
					<td id="stundent_name"></td>
					<td id="email"></td>
					<td id="roll"></td>
					<td id="session"></td>
					<td id="phone_number"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<!-- Add Student Modal -->

<!-- End -->
@endsection
@push('scripts')
<script>
	document.getElementById("name").innerHTML          = localStorage.getItem("name");
	document.getElementById("stundent_name").innerHTML = localStorage.getItem("name");
	document.getElementById("email").innerHTML         = localStorage.getItem("email");
	document.getElementById("roll").innerHTML          = localStorage.getItem("roll");
	document.getElementById("session").innerHTML       = localStorage.getItem("session");
	document.getElementById("phone_number").innerHTML  = localStorage.getItem("phone_number");
</script>
@endpush



