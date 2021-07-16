const validateEmail = email => {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

const validateFields = (...fields) => {
    let valid = true;
    const f = {};
    for (let field of fields) {
        let value = $(`#${field}`).val();
        if(!value){
            $(`#${field}_err`).html("<p style='color: red;'>Please fillout this field</p>");
            valid = false;
        } else {
             $(`#${field}_err`).html("");
             f[field] = value;
        }
    }
    
    if (!valid) return;
    return f;
}