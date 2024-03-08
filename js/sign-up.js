var form=document.getElementById("reg_form");
async function submitForm(event){
    //Preventing page refresh
    let submitForm = true;
   event.preventDefault();  

   // username validation
   function validUsername(str) {
    return /^[a-zA-Z0-9\_]+$/.test(str);
    }
    let username = document.getElementById("username").value;
    if(username == ""){
        submitForm = false;
    }else{
        if(!validUsername(username)){
            $("#usernameAlert").removeClass("d-none")
            submitForm = false;
        }else{
            if(username[0].toLowerCase() != username[0].toUpperCase()){
                $("#usernameAlert").addClass("d-none")
            }else{
                $("#usernameAlert").removeClass("d-none")
                submitForm = false;
            }
        }
    }
    // username validation end

    // password validation
    let confirmPassword = document.getElementById("confirmPassword").value;
    let password = document.getElementById("password").value;
    if(password != confirmPassword){
        $("#passwordAlert").removeClass("d-none")
        submitForm = false;
    }else{
        $("#passwordAlert").addClass("d-none")
    }
    // password validation end

    if(submitForm){
    var formData = new FormData(document.querySelector('form'));
        let fr_phone = "+91" + formData.get("phone-number");
        formData.set('phone-number',fr_phone);
        const data = new URLSearchParams(formData.entries());
        await fetch('modules/signup.php', {
            method: 'POST',
            body: data
        }) 
        .then(response => response.json())
        .then((response) => {
            console.log(response);
            if(response.emailExist === true){
                $("#emailExist").removeClass("d-none");
            }else{
                $("#emailExist").addClass("d-none");
            }
            if(response.usernameExist === true){
                $("#usernameExist").removeClass("d-none");
            }else{
                $("#usernameExist").addClass("d-none");
            }
            if(response.phoneNoExist === true){
                $("#phoneExist").removeClass("d-none");
            }else{
                $("#phoneExist").addClass("d-none");
            }
            if(response.register === true){
            location.replace("login.php")
            }
        })
    }
}
form.addEventListener('submit', submitForm);
