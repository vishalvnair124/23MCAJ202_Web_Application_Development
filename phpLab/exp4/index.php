<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "iot_sensors";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get today's date in "YYYY-MM-DD" format
$today = date("Y-m-d");

// Query to fetch today's data from the sensor_data table
$todayQuery = "SELECT * FROM sensor_data WHERE date = '$today' LIMIT 1";
$todayResult = $conn->query($todayQuery);

// Query to fetch data for the last 5 days (excluding today), ordered by date in descending order
$last5Query = "SELECT * FROM sensor_data WHERE date < '$today' ORDER BY date DESC LIMIT 5";
$last5Result = $conn->query($last5Query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IoT Sensor Data</title>
    <style>
        /* Styling for the body */
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            padding: 20px;
            text-align: center;
        }

        /* Styling for the table */
        table {
            margin: 20px auto;
            width: 90%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for table headers and cells */
        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
        }

        /* Styling for table headers */
        th {
            background: #007bff;
            color: white;
        }

        /* Highlight today's data rows */
        .today {
            background-color: #ffefc3;
            font-weight: bold;
        }

        /* Styling for section titles */
        .title {
            margin-top: 40px;
            font-size: 22px;
            color: #333;
        }
    </style>
</head>

<body>

    <!-- Page heading -->
    <h2>🌦️ IoT Sensor Monitoring</h2>

    <!-- Display today's data if available -->
    <?php if ($todayResult->num_rows > 0): ?>
        <h3 class="title">🔴 Today's Data (<?php echo $today; ?>)</h3>
        <table>
            <tr>
                <!-- Table headers for today's data -->
                <th>Date</th>
                <th>Temperature (°C)</th>
                <th>Humidity (%)</th>
                <th>Rainfall (mm)</th>
                <th>Climate</th>
            </tr>
            <?php while ($row = $todayResult->fetch_assoc()): ?>
                <tr class="today">
                    <!-- Display today's data dynamically -->
                    <td><?= $row["date"]; ?></td>
                    <td><?= $row["temperature"]; ?></td>
                    <td><?= $row["humidity"]; ?></td>
                    <td><?= $row["rainfall"]; ?></td>
                    <td><?= $row["climate"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <!-- Message if no data is available for today -->
        <h4>No data for today (<?php echo $today; ?>).</h4>
    <?php endif; ?>

    <!-- Display data for the last 5 days -->
    <h3 class="title">🕓 Last 5 Days Data</h3>
    <table>
        <tr>
            <!-- Table headers for the last 5 days -->
            <th>Date</th>
            <th>Temperature (°C)</th>
            <th>Humidity (%)</th>
            <th>Rainfall (mm)</th>
            <th>Climate</th>
        </tr>
        <?php
        if ($last5Result->num_rows > 0) {
            // Loop through and display each row of data for the last 5 days
            while ($row = $last5Result->fetch_assoc()) {
                echo "<tr>
                <td>{$row['date']}</td>
                <td>{$row['temperature']}</td>
                <td>{$row['humidity']}</td>
                <td>{$row['rainfall']}</td>
                <td>{$row['climate']}</td>
            </tr>";
            }
        } else {
            // Message if no past data is available
            echo "<tr><td colspan='5'>No past data</td></tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
// Close the database connection
$conn->close();
?>