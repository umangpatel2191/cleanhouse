var form=document.getElementById("login_form");
async function submitForm(event){
   event.preventDefault();  
    var formData = new FormData(document.querySelector('form'));
    const data = new URLSearchParams(formData.entries());
    await fetch('modules/login.php', {
        method: 'POST',
        body: data
    }) 
    .then(response => response.json())
    .then((response) => {
        console.log(response);
        if(response.success === true){
            location.replace("index.php")
        }else{
            $("#loginFailed").removeClass("d-none");
        }
    })
}
form.addEventListener('submit', submitForm);
