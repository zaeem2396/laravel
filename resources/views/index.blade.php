<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="container col-md-4 mt-5">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email">
            <div id="email_err"></div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
            <div id="password_err"></div>
        </div>
        <div class="form-group">
            <a href="#" class="btn btn-sm btn-link">Click here to Register</a>
        </div>
        <button type="button" class="btn btn-primary" onclick="auth()">Log In</button>
    </div>
</body>
<script src="{{ asset('js/js-functions.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const auth = () => {
        let email = document.getElementById("email").value
        let password = document.getElementById("password").value
        if (!validateEmail(email) || !email) {
            return document.getElementById("email_err").innerHTML = "<p class='text-danger'>Invalid email address</p>"
        }
        if (!password) {
            return document.getElementById("password_err").innerHTML = "<p class='text-danger'>Password cannot be blank</p>"
        }
        $.ajax({
            url: "{{ URL::to('/Auth') }}",
            method: "POST",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                console.log(response);
                let data = JSON.parse(response)
                if(data.status == 200) {
                    window.location = "{{ URL::to('/dashboard') }}"
                }
            }
        })
    }
</script>

</html>