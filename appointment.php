<?php
// Include database connection file
include('db_connection.php');  // Assume you have this file to connect to your DB

// Fetch appointment data from the database
$query = "SELECT appointments.id, appointments.customer_name, appointments.date, appointments.time, services.service_name, trainers.trainer_name, appointments.status FROM appointments 
          INNER JOIN services ON appointments.service_id = services.id
          INNER JOIN trainers ON appointments.trainer_id = trainers.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Appointments - FitZone Fitness Center</title>
  <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  
  <!-- Navbar -->
  <header class="bg-blue-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">FitZone - Manage Appointments</h1>
      <nav class="space-x-6">
        <a href="index.html" class="hover:text-gray-200">Home</a>
        <a href="staff.html" class="hover:text-gray-200">Dashboard</a>
        <a href="logout.php" class="hover:text-gray-200">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Appointment Table Section -->
  <section class="py-16 bg-gray-100">
    <div class="max-w-7xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-blue-600 mb-8">Appointments Overview</h2>
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr class="bg-blue-600 text-white">
            <th class="py-3 px-4">Customer Name</th>
            <th class="py-3 px-4">Service</th>
            <th class="py-3 px-4">Trainer</th>
            <th class="py-3 px-4">Date</th>
            <th class="py-3 px-4">Time</th>
            <th class="py-3 px-4">Status</th>
            <th class="py-3 px-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Display appointment data
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td class='py-2 px-4'>" . $row['customer_name'] . "</td>";
            echo "<td class='py-2 px-4'>" . $row['service_name'] . "</td>";
            echo "<td class='py-2 px-4'>" . $row['trainer_name'] . "</td>";
            echo "<td class='py-2 px-4'>" . $row['date'] . "</td>";
            echo "<td class='py-2 px-4'>" . $row['time'] . "</td>";
            echo "<td class='py-2 px-4'>" . $row['status'] . "</td>";
            echo "<td class='py-2 px-4'>
                    <a href='edit_appointment.php?id=" . $row['id'] . "' class='text-blue-600 hover:text-blue-800'>Edit</a> | 
                    <a href='delete_appointment.php?id=" . $row['id'] . "' class='text-red-600 hover:text-red-800'>Delete</a>
                  </td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
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

<?php
// Close the database connection
mysqli_close($conn);
?>
