<script>
	function getData(){
		let getUrl = '{{ route('index') }}'
		$.ajax({
			url:getUrl ,
			type: "GET",
			data:{},
			dataType:"JSON",
			success:(res) => {
				buildTable(res.data) 
			},
			error:(e) => {
				console.log(e)
			}
		});
	}

	getData();

	function buildTable(data){
	 	let table = document.getElementById("myTable")
	 		table.innerHTML='';
	 	for(let i = 0 ; i< data.length; i++){
	 		let row  = `<tr>
	 						<td>${i+1}</td>
	 						<td>${data[i].name}</td>
	 						<td>${data[i].email}</td>
	 						<td>${data[i].roll}</td>
	 						<td>${data[i].session}</td>
	 						<td>${data[i].phone_number}</td>
	 						<td>
								<div class="btn-group">
									<a class="btn btn-info btn-sm" onclick="edit('${data[i].id}')" href="#modalEditStudent" data-toggle="modal"><i class="fa fa-edit"></i></a>
									<a href="#" class="btn btn-danger btn-sm" onclick="removeStudent('${data[i].id}')"><i class="fa fa-trash"></i></a>
								</div>
							</td>
	 					</tr>`
	 		table.innerHTML +=row
	 	}
	}

	function removeStudent(id){
	 	$.ajax({
			url:'destroy/'+id ,
			type: "GET",
			dataType:"JSON",
			success:(res) => {
				if(res.status){
					getData()
					toastr.success(res.message)
				}
			},
			error:(e) => {
				console.log(e)
			}
	  });
	}

	function edit(id){
		$.ajax({
			url:'show/'+id ,
			type: "GET",
			dataType:"JSON",
			success:(res) => {
				document.getElementById("stu_id").value       = res.data.id;
				document.getElementById("name").value         = res.data.name;
				document.getElementById("email").value        = res.data.email;
				document.getElementById("roll").value         = res.data.roll;
				document.getElementById("session").value      = res.data.session;
				document.getElementById("phone_number").value = res.data.phone_number;
			},
			error:(e) => {
				console.log(e)
			}
	    });
	}

	function resetForm(){
		document.getElementById("myForm").reset()
	}

/*For Student Information Update*/

	const UpdateUrl = '{{ route('update') }}';
	const updateToken = document.querySelector(`meta[name='csrf-token']`).content;

	document.getElementById("updateStudent").addEventListener('click', function(e){
		e.preventDefault()
		let id           = document.getElementsByClassName("stu_id")[0]
		let name         = document.getElementsByClassName("Name")[0];
		let email        = document.getElementsByClassName("Email")[0];
		let roll         = document.getElementsByClassName("Roll")[0];
		let session      = document.getElementsByClassName("Session")[0];
		let phone_number = document.getElementsByClassName("Phone_number")[0];
		$.ajax({
			url: UpdateUrl,
			type: "POST",
			data: {
				_token: updateToken,
				id:id.value,
				name: name.value,
				email: email.value,
				roll: roll.value,
				session: session.value,
				phone_number: phone_number.value
			},
			dataType:"JSON",
			success:(res) => {
				if(res.status){
					$('#modalEditStudent').modal('hide')
					resetForm()
					getData()
					toastr.success(res.message);
				}else{
					toastr.error(res.message);
				}
			},
			error:(e) => {
				console.log(e)
				Object.keys(e.responseJSON.errors).forEach((key) => {
					toastr.error(e.responseJSON.errors[key][0]);
				})
			}
		});
	});

/*For Student Information store*/
   	const url = '{{ route('store') }}';
	const token = document.querySelector(`meta[name='csrf-token']`).content;
	document.getElementById("storeStudent").addEventListener('click', function(e){
		e.preventDefault()
		let name         = document.getElementsByClassName("name")[0];
		let email        = document.getElementsByClassName("email")[0];
		let password     = document.getElementsByClassName("password")[0];
		let roll         = document.getElementsByClassName("roll")[0];
		let session      = document.getElementsByClassName("session")[0];
		let phone_number = document.getElementsByClassName("phone_number")[0];

		if(name.value == ''){
			document.getElementById("name-feedback").innerHTML = "Please Enter a Name";
			document.getElementById("name-feedback").style.display="block";
		}else{
			document.getElementById("name-feedback").innerHTML = "";
			document.getElementById("name-feedback").style.display="none";
		}

		if(email.value == ''){
			document.getElementById("email-feedback").innerHTML = "Please Enter a Valid Email";
			document.getElementById("email-feedback").style.display="block";
		}else{
			document.getElementById("email-feedback").innerHTML = "";
			document.getElementById("email-feedback").style.display="none";
		}
		if(password.value == ''){
			document.getElementById("password-feedback").innerHTML = "Please Enter a Strong Password";
			document.getElementById("password-feedback").style.display="block";
		}else{
			document.getElementById("password-feedback").innerHTML = "";
			document.getElementById("password-feedback").style.display="none";
		}

		if(roll.value == ''){
			document.getElementById("roll-feedback").innerHTML = "Please Enter a roll Or Id";
			document.getElementById("roll-feedback").style.display="block";
		}else{
			document.getElementById("roll-feedback").innerHTML = "";
			document.getElementById("roll-feedback").style.display="none";
		}

		if(session.value == ''){
			document.getElementById("session-feedback").innerHTML = "Please Enter a session";
			document.getElementById("session-feedback").style.display="block";
		}else{
			document.getElementById("session-feedback").innerHTML = "";
			document.getElementById("session-feedback").style.display="none";
		}

		if(phone_number.value == ''){
			document.getElementById("phone_number-feedback").innerHTML = "Please Enter a phone number";
			document.getElementById("phone_number-feedback").style.display="block";
		}else{
			document.getElementById("phone_number-feedback").innerHTML = "";
			document.getElementById("phone_number-feedback").style.display="none";
		}

		$.ajax({
			url: url,
			type: "POST",
			data:{
				_token: token,
				name: name.value,
				email: email.value,
				password: password.value,
				roll: roll.value,
				session: session.value,
				phone_number: phone_number.value
			} ,
			dataType:"JSON",
			success:(res) => {
				if(res.status){
					$('#modalAddStudent').modal('hide')
					resetForm()
					getData()
					toastr.success(res.message);
				}else{
					toastr.error(res.message);
				}
			},
			error:(e) => {
				Object.keys(e.responseJSON.errors).forEach((key) => {
					toastr.error(e.responseJSON.errors[key][0]);
				})
			}
		});
	});
</script>