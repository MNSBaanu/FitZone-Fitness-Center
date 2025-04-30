<?php
// Include the database connection
include('includes/db.php');

// Initialize variables for feedback message and form fields
$feedback = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validate that the fields are not empty
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $feedback = "All fields are required.";
    } elseif ($password != $confirm_password) {
        // Check if passwords match
        $feedback = "Passwords do not match.";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists in the database
        $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $email_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            // If user already exists, give feedback
            $feedback = "Email is already registered. Please use a different email.";
        } else {
            // Insert the new user into the database
            $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            if (mysqli_query($conn, $query)) {
                // Redirect to the login page after successful registration
                header("Location: login.php");
                exit();
            } else {
                $feedback = "Error registering user: " . mysqli_error($conn);
            }
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FitZone Fitness Center</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navbar -->
    <header class="bg-blue-600 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">FitZone - Register</h1>
            <nav class="space-x-6">
                <a href="index.html" class="hover:text-gray-200">Home</a>
                <a href="login.php" class="hover:text-gray-200">Login</a>
            </nav>
        </div>
    </header>

    <!-- Registration Form -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
            <h2 class="text-3xl font-bold text-center mb-4">Create an Account</h2>
            
            <?php if (!empty($feedback)) { ?>
                <div class="bg-red-600 text-white p-2 rounded mb-4">
                    <?php echo $feedback; ?>
                </div>
            <?php } ?>

            <form method="POST" action="register.php">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Register</button>
                </div>
            </form>
            <p class="text-center text-sm">Already have an account? <a href="login.php" class="text-blue-600 hover:underline">Login here</a></p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white p-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 FitZone Fitness Center. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
