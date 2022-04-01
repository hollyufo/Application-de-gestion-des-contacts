const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('loginform')
const passworderror = document.getElementById('passwordError')
const usernameErrorField = document.getElementById('usernameError')
var valid
// checking data for all inputs if it exist
var index = 0
const patterns = /^[a-z0-9]{3,15}$/
form.addEventListener('submit', (e) => {
    if (username.value === '' || username.value == null) {
        index++
        username.classList.add("is-invalid");
    }
    if(patterns.test(username.value) == false){
        index++
        username.classList.add("is-invalid");
        usernameErrorField.innerText = "your username must be between 3 and 10 characters and alphanumeric only."
    }

    if (password.value === '' || password.value == null) {
        index++
        password.classList.add("is-invalid");
        passworderror.innerText = "password is required"
    }
    if (index > 0) {
        e.preventDefault()
    }
}) 
