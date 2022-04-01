const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('loginform')
var valid
// checking data for all inputs if it exist
var index = 0
form.addEventListener('submit', (e) => {
  if (username.value === '' || username.value == null) {
    index++
    username.classList.add("is-invalid");
  }else{
    username.classList.add("is-valid");
  }
  if (password.value === '' || password.value == null) {
    index++
    password.classList.add("is-invalid");
  }
  if (index > 0) {
    e.preventDefault()
    }
      
})    
