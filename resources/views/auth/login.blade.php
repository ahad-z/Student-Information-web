@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login Here</div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control email" name="email" value="{{ old('email') }}">
                                <span class="invalid-feedback" id="email-feedback" role="alert"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control password" name="password" autocomplete="current-password">
                                <span class="invalid-feedback" role="alert" id="password-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit">
                                Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    const url = '{{ route('authenticate') }}';
    const token = document.querySelector(`meta[name='csrf-token']`).content;
    document.getElementById("btn-submit").addEventListener('click', function(e) {
        e.preventDefault()
        let email = document.getElementsByClassName('email')[0];
        let password = document.getElementsByClassName('password')[0];

        if(email.value === '') {
            document.getElementById('email-feedback').innerHTML = 'Please enter Valid Email address';
            document.getElementById('email-feedback').style.display = 'block';
            return;
        }else{
            document.getElementById('email-feedback').innerHTML = '';
            document.getElementById('email-feedback').style.display = 'none';
        }

        if(password.value === '') {
            document.getElementById('password-feedback').innerHTML = 'Please enter a strong Password';
            document.getElementById('password-feedback').style.display = 'block';
            return;
        }else{
            document.getElementById('password-feedback').innerHTML = '';
            document.getElementById('password-feedback').style.display = 'none';
        }

        $.ajax({
          url: url,
          type: "POST",
          data: {
            _token: token,
            email: email.value,
            password: password.value
        },
          dataType: "JSON",
          success: (r) => {
            if(r.status && r.type == 'admin'){
                location.replace("{{ route('dashboard') }}");
            }else if(r.status && r.type == 'student'){
                console.log(r.data);
                localStorage.setItem("name", r.data.name);
                localStorage.setItem("email", r.data.email);
                localStorage.setItem("roll", r.data.roll);
                localStorage.setItem("session", r.data.session);
                localStorage.setItem("phone_number", r.data.phone_number);
                location.replace("{{ route('StudentDashboard') }}");
            }
            else{
                toastr.error('Credential Dont Match')
            }
           
          },
          error: (e) => {
            Object.keys(e.responseJSON.errors).forEach((key) => {
                toastr.error(e.responseJSON.errors[key][0])
            })
          }
        });
    });
  
</script>
@endpush