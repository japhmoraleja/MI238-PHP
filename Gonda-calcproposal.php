<html>
<head>
<title>Medical Calculator Proposal</title>
<meta charset="utf-8">
</head>
<body>
<style>
    body {
        background: #F5F5DC;
        color: black;
    }
</style>    
<h1><center>PHP Calculator</center></h5>
<?php
    echo "<strong>";
    echo '<p style="color: brown;">PHP Calculator Name</p>';
    echo "</strong>";
    echo "Body Surface Area (BSA) Based Dosing";
    echo "<br>";
    echo "<strong>";
    echo '<p style="color: brown;">Purpose</p>';
    echo "</strong>";
    echo "The calculator seeks to compute the dose for a patient using his/her Body Surface Area (BSA). Using BSA may help prescriber's dose more optimally to improve drug efficacy, minimize drug toxicity, and account for some changes in pharmacokinetics depending on patient factors.";
    echo "<br>";
    echo "<br>";
    echo "<strong>";
    echo '<p style="color: brown;">Input Names</p>';
    echo "</strong>";
    $obInput = array("BSA Based Dose (mg/m2, mcg/m2, g/m2)",
                    "Weight in kilogram (kg)", 
                    "Height in centimeter (cm)");
    foreach($obInput as $obInputAll){
        echo $obInputAll . "<br>";
    }
    echo "<br>";
    echo "<strong>";
    echo '<p style="color: brown;">Formula to be used</p>';
    echo "</strong>";
    $obFormula = array("The formula to be used is <b> Monteller Formula for BSA Dosing </b>.",
                        "Dose= BSA Based Dose x square root [(Height(cm) x Weight (kg))/ 3600]");
    foreach($obFormula as $obFormulaAll){
        echo $obFormulaAll . "<br>";
    }
    echo "<br>";
    echo "<strong>";
    echo '<p style="color: brown;">Expected Output</p>';
    echo "</strong>";
    $obOutput = array("Computed BSA", 
                    "BSA Based Dose");
    foreach($obOutput as $obOutputAll){
        echo $obOutputAll . "<br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>
    <h3>BSA Based Dosing Calculator</h3>
    <p><a href="BSA Based Dosing Calc.php">Go to this page</a></p>
</body>
</html>