const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('loginform')
const usernameErrorField = document.getElementById('usernameError')
const verifypassword = document.getElementById('verifypassword')
const passworderrorfield = document.getElementById('passwordError')
var valid
// checking data for all inputs if it exist
var index = 0
const patterns = /^[a-z0-9_-]{3,15}$/
const passpattrerns = /^[a-zA-Z0-9]{6,15}$/ 
form.addEventListener('submit', (e) => {
    if (username.value === '' || username.value == null) {
        index++
        username.classList.add("is-invalid");
    }
    if(patterns.test(username.value) == false){
        index++
        username.classList.add("is-invalid");
        usernameErrorField.innerText = "your username must be between 3 and 10 characters and alphanumeric only.";
    }
    if (password.value === '' || password.value == null) {
        index++
        password.classList.add("is-invalid");
        passworderrorfield.innerText = "password is required"
        verifypassword.classList.add("is-invalid");
    }
    if(passpattrerns.test(password.value) == false){
        index++
        password.classList.add("is-invalid");
        passworderrorfield.innerText = "your password must be between 6 and 15 characters and should contain uppercase lowercase and number."
        verifypassword.classList.add("is-invalid");
    }
    if (password.value != verifypassword.value) {
        index++
        password.classList.add("is-invalid");
        verifypassword.classList.add("is-invalid");
        passworderrorfield.innerText = "Password does not match"
    }
    if (index > 0) {
        e.preventDefault()
    }

})    