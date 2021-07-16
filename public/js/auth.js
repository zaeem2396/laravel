const auth = () => {
    let email = document.getElementById("email").value
    let password = document.getElementById("password").value
    let fields = validateFields("email", "password")
    if(!fields) {
        return
    }
    if (!validateEmail(email)) {
        return document.getElementById("email_err").innerHTML = "<p style='color: red;'>Invalid email address</p>"
    }
    $.ajax({
        url: "/Auth",
        method: "POST",
        data: {
            email: email,
            password: password
        },
        success: function(response) {
            console.log(response);
            let data = JSON.parse(response)
            if(data.status == 200) {
                window.location = "/dashboard"
            }
        }
    })
}