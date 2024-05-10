<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<section id="logRegForm" class="logRegForm"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="contact_form_wrappre2">
                    <h2>login🔐</h2>
                    <p class="lead text-secondary text-center">Oasis de Tozeur🏝️</p>
                    <form action="process_connexion.php" method="post" onsubmit="return validateAndRedirect()">
                        <div class="inputArea">
                            <div class="form-row">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter username or email" aria-describedby="Site" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="Site">
                                                <?xml version="1.0" encoding="utf-8"?>
                                                <svg fill="#ffffff" width="30px" height="30px" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block; margin: auto;">
                                                    <path class="clr-i-solid clr-i-solid-path-1" d="M32.33,6a2,2,0,0,0-.41,0h-28a2,2,0,0,0-.53.08L17.84,20.47Z"></path>
                                                    <path class="clr-i-solid clr-i-solid-path-2" d="M33.81,7.39,19.25,21.89a2,2,0,0,1-2.82,0L2,7.5a2,2,0,0,0-.07.5V28a2,2,0,0,0,2,2h28a2,2,0,0,0,2-2V8A2,2,0,0,0,33.81,7.39ZM5.3,28H3.91V26.57l7.27-7.21,1.41,1.41Zm26.61,0H30.51l-7.29-7.23,1.41-1.41,7.27,7.21Z"></path>
                                                    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                                                </svg>                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Your password" aria-describedby="url" required pattern=".{6,}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="url">
                                                <svg width="30px" height="30px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; margin: auto;">
                                                    <path d="M11 11H10V10H11V11Z" fill="#ffffff"/>
                                                    <path d="M8 11H9V10H8V11Z" fill="#ffffff"/>
                                                    <path d="M13 11H12V10H13V11Z" fill="#ffffff"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6V3.5C3 1.567 4.567 0 6.5 0C8.433 0 10 1.567 10 3.5V6H11.5C12.3284 6 13 6.67157 13 7.5V8.05001C14.1411 8.28164 15 9.29052 15 10.5C15 11.7095 14.1411 12.7184 13 12.95V13.5C13 14.3284 12.3284 15 11.5 15H1.5C0.671573 15 0 14.3284 0 13.5V7.5C0 6.67157 0.671573 6 1.5 6H3ZM4 3.5C4 2.11929 5.11929 1 6.5 1C7.88071 1 9 2.11929 9 3.5V6H4V3.5ZM8.5 9C7.67157 9 7 9.67157 7 10.5C7 11.3284 7.67157 12 8.5 12H12.5C13.3284 12 14 11.3284 14 10.5C14 9.67157 13.3284 9 12.5 9H8.5Z" fill="#ffffff"/>
                                                </svg>                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    <button class="loginnow" type="submit">Login Now</button>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="Inscription.php" style="color: black;">Créer un compte</a>
                            </div>
                            <div class="text-center mt-3">
                                <a href="forget_password.php" style="color: black;">Forget Password?</a>
                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function validateAndRedirect() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var usernamePattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var passwordPattern = /.{6,}/;
    
    if (!usernamePattern.test(username) || !passwordPattern.test(password)) { 
        alert("Please enter a valid username/email and a password with at least 6 characters.");
        return false;
    }
    
    return true;
}
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src
