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
        alert('Passwords do not match')
        return false
    }
}