<?php
// Initialize variables for error messages and success message
$errorMessages = [];
$successMessage = "";

// List of valid countries for the dropdown
$countries = ["India", "USA", "Canada", "UK", "Australia"];

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Function to sanitize user input
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Validate Full Name
    if (empty($_POST["name"])) {
        $errorMessages["name"] = "Full Name is required"; // Error if name is empty
    } elseif (!preg_match("/^[A-Za-z ]+$/", $_POST["name"])) {
        $errorMessages["name"] = "Enter a valid name (letters only)"; // Error if name contains invalid characters
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errorMessages["email"] = "Email is required"; // Error if email is empty
    } elseif (!preg_match("/^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i", $_POST["email"])) {
        $errorMessages["email"] = "Enter a valid email"; // Error if email format is invalid
    }

    // Validate Phone Number
    if (empty($_POST["phone"])) {
        $errorMessages["phone"] = "Phone number is required"; // Error if phone number is empty
    } elseif (!preg_match("/^[1-9][0-9]{9}$/", $_POST["phone"])) {
        $errorMessages["phone"] = "Enter a valid 10-digit phone number"; // Error if phone number is invalid
    }

    // Validate Date of Birth
    if (empty($_POST["dob"])) {
        $errorMessages["dob"] = "Date of Birth is required"; // Error if DOB is empty
    } else {
        $dob = strtotime($_POST["dob"]);
        if ($dob > time()) {
            $errorMessages["dob"] = "Date of Birth cannot be in the future"; // Error if DOB is in the future
        }
    }

    // Validate Pin Code
    if (empty($_POST["pincode"])) {
        $errorMessages["pincode"] = "Pin Code is required"; // Error if pin code is empty
    } elseif (!preg_match("/^\d{6}$/", $_POST["pincode"])) {
        $errorMessages["pincode"] = "Enter a valid 6-digit pin code"; // Error if pin code is invalid
    }

    // Validate Address
    if (empty($_POST["address"])) {
        $errorMessages["address"] = "Address cannot be empty"; // Error if address is empty
    }

    // Validate Country
    if (empty($_POST["country"])) {
        $errorMessages["country"] = "Country selection is required"; // Error if no country is selected
    } elseif (!in_array($_POST["country"], $countries)) {
        $errorMessages["country"] = "Invalid country selection"; // Error if selected country is not in the list
    }

    // If no errors, set success message
    if (empty($errorMessages)) {
        $successMessage = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General body styling */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #d4edda;
            margin: 0;
        }

        /* Styling for the form container */
        .container {
            background: white;
            padding: 30px;
            margin: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            width: 40%;
            text-align: center;
            color: black;
        }

        /* Styling for the form heading */
        h2 {
            color: #28a745;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Styling for input groups */
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        /* Styling for labels */
        label {
            text-align: left;
            display: block;
            font-weight: 700;
            margin-bottom: 6px;
        }

        /* Styling for input fields and dropdowns */
        input,
        select {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
            outline: none;
        }

        /* Focus effect for input fields and dropdowns */
        input:focus,
        select:focus {
            box-shadow: 0px 0px 8px rgba(40, 167, 69, 0.5);
        }

        /* Styling for error messages */
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        /* Styling for the submit button */
        button {
            background: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: 0.3s;
            font-weight: 600;
        }

        /* Hover effect for the submit button */
        button:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="">
            <!-- Full Name Input -->
            <label>Full Name</label>
            <input type="text" name="name" value="<?php echo $_POST['name'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['name'] ?? ''; ?></span><br>

            <!-- Email Input -->
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $_POST['email'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['email'] ?? ''; ?></span><br>

            <!-- Phone Number Input -->
            <label>Phone Number</label>
            <input type="text" name="phone" value="<?php echo $_POST['phone'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['phone'] ?? ''; ?></span><br>

            <!-- Date of Birth Input -->
            <label>Date of Birth</label>
            <input type="date" name="dob" value="<?php echo $_POST['dob'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['dob'] ?? ''; ?></span><br>

            <!-- Pin Code Input -->
            <label>Pin Code</label>
            <input type="text" name="pincode" value="<?php echo $_POST['pincode'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['pincode'] ?? ''; ?></span><br>

            <!-- Address Input -->
            <label>Address</label>
            <input type="text" name="address" value="<?php echo $_POST['address'] ?? ''; ?>">
            <span class="error"> <?php echo $errorMessages['address'] ?? ''; ?></span><br>

            <!-- Country Dropdown -->
            <label>Country</label>
            <select name="country">
                <option value="">Select Country</option>
                <?php foreach ($countries as $country) {
                    $selected = ($_POST['country'] ?? '') === $country ? 'selected' : '';
                    echo "<option value='$country' $selected>$country</option>";
                } ?>
            </select>
            <span class="error"> <?php echo $errorMessages['country'] ?? ''; ?></span><br>

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>

        <!-- Success Message -->
        <?php if (!empty($successMessage)) : ?>
            <p style="color:#28a745; font-weight: bold;"> <?php echo $successMessage; ?> </p>
        <?php endif; ?>
    </div>
</body>

</html>