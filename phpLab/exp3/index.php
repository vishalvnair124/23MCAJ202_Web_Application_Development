<?php
// Array of Indian Cricket Players with their ODI Batting and Bowling Rankings
$players = [
    // Each player is represented as an associative array with their name, batting rank, and bowling rank
    ["name" => "Rohit Sharma", "batting_rank" => 3, "bowling_rank" => "-"],
    ["name" => "Shubman Gill", "batting_rank" => 1, "bowling_rank" => "-"],
    ["name" => "Virat Kohli", "batting_rank" => 5, "bowling_rank" => "-"],
    ["name" => "Shreyas Iyer", "batting_rank" => 10, "bowling_rank" => "-"],
    ["name" => "KL Rahul", "batting_rank" => 15, "bowling_rank" => "-"],
    ["name" => "Rishabh Pant", "batting_rank" => 20, "bowling_rank" => "-"],
    ["name" => "Hardik Pandya", "batting_rank" => 25, "bowling_rank" => 18],
    ["name" => "Ravindra Jadeja", "batting_rank" => 32, "bowling_rank" => 10],
    ["name" => "Mohammed Shami", "batting_rank" => "-", "bowling_rank" => 5],
    ["name" => "Kuldeep Yadav", "batting_rank" => "-", "bowling_rank" => 7],
    ["name" => "Arshdeep Singh", "batting_rank" => "-", "bowling_rank" => 12],
    ["name" => "Harshit Rana", "batting_rank" => "-", "bowling_rank" => 15],
    ["name" => "Varun Chakaravarthy", "batting_rank" => "-", "bowling_rank" => 20],
    ["name" => "Axar Patel", "batting_rank" => 40, "bowling_rank" => 30],
    ["name" => "Washington Sundar", "batting_rank" => 50, "bowling_rank" => 25],
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indian Cricket Players - ODI Rankings</title>
    <style>
        /* Styling for the body */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }

        /* Styling for the table */
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for table headers and cells */
        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Styling for table headers */
        th {
            background-color: #28a745;
            color: white;
        }

        /* Alternate row coloring for better readability */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <!-- Heading for the page -->
    <h2>Indian Cricket Players - ODI Batting & Bowling Rankings</h2>

    <!-- Table displaying player rankings -->
    <table>
        <tr>
            <!-- Table headers -->
            <th>Player Name</th>
            <th>ODI Batting Rank</th>
            <th>ODI Bowling Rank</th>
        </tr>
        <?php foreach ($players as $player) : ?>
            <tr>
                <!-- Displaying player details dynamically -->
                <td><?php echo $player["name"]; ?></td>
                <td><?php echo $player["batting_rank"]; ?></td>
                <td><?php echo $player["bowling_rank"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>