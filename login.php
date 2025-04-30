<?php
// Include database connection
include('includes/db.php');

// Start session to track user login state
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if the username and password match
    $query = "SELECT id, username, password, role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Check if the user exists
    if (mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, create session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];
            
            // Redirect based on the user role (Customer, Staff, Admin)
            if ($row['role'] == 'admin') {
                header('Location: admin/dashboard.php');
            } elseif ($row['role'] == 'staff') {
                header('Location: staff/dashboard.php');
            } else {
                header('Location: customer/dashboard.php');
            }
            exit();
        } else {
            $error_message = "Invalid password!";
        }
    } else {
        $error_message = "No user found with that username!";
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
    <title>Login - FitZone Fitness Center</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navbar -->
    <header class="bg-blue-600 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">FitZone - Login</h1>
            <nav class="space-x-6">
                <a href="index.html" class="hover:text-gray-200">Home</a>
                <a href="register.html" class="hover:text-gray-200">Register</a>
            </nav>
        </div>
    </header>

    <!-- Login Form -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
            <h2 class="text-3xl font-bold text-center mb-4">Login to Your Account</h2>
            <?php if (isset($error_message)) { ?>
                <div class="bg-red-600 text-white p-2 rounded mb-4">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            <form method="POST" action="login.php">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Login</button>
                </div>
                <p class="text-center text-gray-700">
                    Don't have an account? <a href="register.html" class="text-blue-600 hover:text-blue-800">Register here</a>
                </p>
            </form>
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
