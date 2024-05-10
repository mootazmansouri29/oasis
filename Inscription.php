<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Responsive Registration Form | CodingLab</title>
  <link href="css/Inscription.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
  <div class="title">Registration 📋</div>
  <div class="content">
    <form action="ajout_inscription.php" method="Post">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Full Name</span>
          <input type="text" name="full_name" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <span class="details">Username</span>
          <input type="text" name="username" placeholder="Enter your username" required>
        </div>
        <div class="input-box">
          <span class="details">Email</span>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="text" name="phone_number" placeholder="Enter your number" required>
        </div>
        <div class="input-box">
          <span class="details">Password</span>
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="input-box">
          <span class="details">Confirm Password</span>
          <input type="password" name="confirm_password" placeholder="Confirm your password" required>
        </div>
      </div>
      <div class="button">
        <input type="submit" value="Register">
      </div>
    </form>
  </div>
</div>
</body>
</html>
