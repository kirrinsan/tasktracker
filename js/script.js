// Delete confirmation
function Delete() {
    return confirm('Are you sure you want to delete this task?')
}

function matchingPasswords() {
    let password = document.getElementById('password').value 
    let confirm = document.getElementById('confirm').value 

    if (password == confirm) {
        return true 
    }
    else {
        alert('Passwords do not match. Try Again.')
        return false
    }
}

// Toggle password
const showHide =  document.getElementById('show-hide');
const password = document.getElementById('password');

showHide.addEventListener('click', function (e) {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-solid fa-eye-slash');
})
