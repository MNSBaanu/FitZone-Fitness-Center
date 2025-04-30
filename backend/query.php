<?php
// Include the database connection
include('includes/db.php');

// Start the session to track user login state
session_start();

// Initialize variables for feedback message and form fields
$feedback = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data and sanitize it
    $user_id = $_SESSION['user_id']; // Assuming the user is logged in
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Validate that the subject and message are not empty
    if (empty($subject) || empty($message)) {
        $feedback = "Please fill in all fields.";
    } else {
        // Insert the query into the database
        $query = "INSERT INTO queries (user_id, subject, message, status) VALUES ('$user_id', '$subject', '$message', 'Pending')";
        if (mysqli_query($conn, $query)) {
            $feedback = "Your query has been submitted successfully. We will get back to you soon.";
        } else {
            $feedback = "Error submitting query: " . mysqli_error($conn);
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
    <title>Submit Your Query - FitZone Fitness Center</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Navbar -->
    <header class="bg-blue-600 text-white p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">FitZone - Submit a Query</h1>
            <nav class="space-x-6">
                <a href="index.html" class="hover:text-gray-200">Home</a>
                <a href="login.php" class="hover:text-gray-200">Login</a>
            </nav>
        </div>
    </header>

    <!-- Query Form -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-md">
            <h2 class="text-3xl font-bold text-center mb-4">Submit Your Query</h2>
            
            <?php if (!empty($feedback)) { ?>
                <div class="bg-yellow-600 text-white p-2 rounded mb-4">
                    <?php echo $feedback; ?>
                </div>
            <?php } ?>

            <form method="POST" action="query.php">
                <div class="mb-4">
                    <label for="subject" class="block text-gray-700">Subject</label>
                    <input type="text" id="subject" name="subject" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700">Message</label>
                    <textarea id="message" name="message" class="w-full p-2 border border-gray-300 rounded mt-2" rows="4" required></textarea>
                </div>
                <div class="mb-6">
                    <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Submit Query</button>
                </div>
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
