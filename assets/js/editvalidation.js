const username = document.getElementById('fullname');
const phone = document.getElementById('phone')
const form = document.getElementById('form-contact')
const email = document.getElementById('email')
const address = document.getElementById('address')
const emailerror = document.getElementById('emailerror')
const phoneerror = document.getElementById('phoneerror')
const usernameerror = document.getElementById('usernameerror')
const addresserror = document.getElementById('addresserror')
// checking data for all inputs if it exist
form.addEventListener('submit', (e) => {
    let index = 0;
    if (username.value === '' || username.value == null) {
        index++
        username.classList.add("is-invalid");
        usernameerror.innerHTML = "Please enter full name"
    }
    if (phone.value === '' || phone.value == null) {
        index++
        phone.classList.add("is-invalid");
        phoneerror.innerHTML = "Please enter phone number"
    }
    if(email.value === '' || email.value == null){
        index++
        email.classList.add("is-invalid");
        emailerror.innerHTML = "Please enter email"
    }
    if(address.value === '' || address.value == null){
        index++
        address.classList.add("is-invalid");
        addresserror.innerHTML = "Please enter address"
    }
    if (index > 0) {
        e.preventDefault();
    }

})    