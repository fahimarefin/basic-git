<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
  <div class="form-container">
    <h2>Registration Form</h2>
    <form method="POST" action="databse1.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <br>

        <label for="ip">IP Address:</label>
        <input type="text" id="ip" name="ip" value="192.168.0.1" required>
        <br>
        <br>

        <label for="url">Personal Web URL:</label>
        <input type="text" id="url" name="url" required>
        <br>
        <br>

        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" placeholder="DD-MM-YYYY" />
        <br>
        <br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label>
        <br>
        <br>

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" required>
        <br>
        <br>

        <label for="info">Brief Info:</label>
        <textarea id="info" name="info" rows="5" cols="30" required></textarea>
        <br>
        <br>

        <input type="submit" value="Register">
    </form>
  </div>