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
    index = 0
    if (username.value === '' || username.value == null) {
        index++
        username.classList.add("is-invalid");
        usernameErrorField.innerText = "Username is required."
    }
    if(patterns.test(username.value) == false){
        index++
        username.classList.add("is-invalid");
        usernameErrorField.innerText = "This is not a valid user name."
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
