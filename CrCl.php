<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creatinine Clearance Calculator in PHP</title>
</head>
<body>
<h1>Creatinine Clearance (CrCl) Calculator</h1>
    <form method="POST" action="">
        <label for="age">Age (years):</label><br>
        <input type="number" name="age" id="age" required><br><br>

        <label for="weight">Weight (kg):</label><br>
        <input type="number" step="any" name="weight" id="weight" required><br><br>

        <label for="serum_creatinine">Serum Creatinine (mg/dL):</label><br>
        <input type="number" step="any" name="serum_creatinine" id="serum_creatinine" required><br><br>

        <label for="gender">Gender:</label><br>
        <select name="gender" id="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <input type="submit" value="Calculate">
    </form>
</body>
</html>

<?php
// Function to calculate Creatinine Clearance
function calculateCreatinineClearance($age, $weight, $serumCreatinine, $gender) {
    // Validate inputs
    if ($age <= 0 || $weight <= 0 || $serumCreatinine <= 0) {
        return "Invalid input. All values must be greater than zero.";
    }

    // Cockcroft-Gault formula for men
    $crCl = ((140 - $age) * $weight) / (72 * $serumCreatinine);

    // Adjust for women (multiply by 0.85)
    if (strtolower($gender) === "female") {
        $crCl *= 0.85;
    }

    return round($crCl, 2); // Round to 2 decimal places
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = (int)$_POST['age'];
    $weight = (float)$_POST['weight'];
    $serumCreatinine = (float)$_POST['serum_creatinine'];
    $gender = $_POST['gender'];

    $creatinineClearance = calculateCreatinineClearance($age, $weight, $serumCreatinine, $gender);
    echo "Creatinine Clearance (CrCl): " . $creatinineClearance . " mL/min";
}
?>

