<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Creatinine Clearance Calculator in PHP</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=SUSE:wght@100..800&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #DAF8FF;
            display: flex;
            justify-content: center; 
            align-items: center;             
            margin: 0;             
            font-family: 'SUSE', sans-serif;
            text-align: center;
            color: #05284BFF;
            padding: 50px;
            }

        h1 {
            font-size: 40px;
            font-family: 'SUSE', sans-serif;
            color: #155391FF;
        }

        h4 {
            font-size: 20px;
            font-family: 'SUSE'. sans-serif;
        }

        label, input, select {
            font-size: 16px;        
            margin-bottom: 0px;
            display: block;
            width: 100%;  
            
        }

        input[type="submit"] {
            width: auto;           
            padding: 10px 20px;   
            background-color: #4D8CCEFF;
            color: white;
            border-radius: 5px;
            border: 1px solid #3B7FC8FF;
            cursor: pointer;
            align-items: center;
            text-align: center;
            font-size: 20px;
        }

        input[type="submit"]:hover {
            background-color: #3B8CE1FF; /* Change button color on hover */
        }

        .calc {
            max-width: 600px;       
            padding: 20px;         
            background-color: #FAFEFFFF;
            border-radius: 20px;   
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.12); 
        }
        
        .result{
            font-size: 28px;
            font-weight: bold;
        }

        .inputForms {
            align-items: center;
            max-width: fit-content;
            margin-left: 200px;
            margin-right: 200px;
        }

        .button {
            max-width: fit-content;
            text-align: center;
            margin: 0 auto;
        }

        hr.dotted {
        border-top: 3px dotted #bbb;
        }
    </style>
    
</head>
<body>
    <div class="calc">
        <h1 style="font-size:40px;" > &#x1F52C Creatinine Clearance (CrCl) Calculator in PHP &#128137</h1>
        
        <h3> What are the input names? </h3>
        <p>
            Age in years <br>
            Weight in kilograms <br>
            Serum Creatinine in mg/dL 
        </p>
        <br>

        <h3> Formula for men:</h3>
        <p> \[
            \text{CrCl (mL/min)} = \frac{(140 - \text{age}) \times \text{weight (kg)}}{72 \times \text{serum creatinine (mg/dL)}}
            \]
        </p>
        
        <h3> Formula for women (adjusted):</h3>
        <p> \[
            \text{CrCl (mL/min)} = \left( \frac{(140 - \text{age}) \times \text{weight (kg)}}{72 \times \text{serum creatinine (mg/dL)}} \right) \times 0.85
            \]
        </p>
        
        <br> 

        <h3> What is the expected output? </h3>

        <p> output </p>
        <!--
        a.	PHP Calculator name
        b.	What are the input names?
        c.	Formula to be used
        d.	What is the expected output?
        --> 

        <br>

        <hr class="dotted">
        
        <br>

        <div class="result">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $age = (int)$_POST['age'];
                    $weight = (float)$_POST['weight'];
                    $serumCreatinine = (float)$_POST['serum_creatinine'];
                    $sex = $_POST['sex'];

                    $creatinineClearance = calculateCreatinineClearance($age, $weight, $serumCreatinine, $sex);
                    if ($creatinineClearance > 0) {
                        echo "Creatinine Clearance (CrCl): " . $creatinineClearance;
                    } else {
                        echo "Creatinine Clearance (CrCl): " . $creatinineClearance . " mL/min";
                    }
                }
            ?>
        </div>
        
        <br>

        <hr class="dotted">

        <br>
    
        <div class="inputForms">
            <form method="POST" action="">
            
                <label for="age">Age (years):</label><br>
                <input type="number" name="age" id="age" required><br>

                <label for="weight">Weight (kg):</label><br>
                <input type="number" step="any" name="weight" id="weight" required><br>

                <label for="serum_creatinine">Serum Creatinine (mg/dL):</label><br>
                <input type="number" step="any" name="serum_creatinine" id="serum_creatinine" required><br>

                <label for="sex">Sex:</label><br>
                <select name="sex" id="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select><br><br>
                
                <br>

            </div>

        <div class="button"> 
            <input type="submit" value="Calculate">
        </div>

        </form>

    </div>
</body>

</html>

<?php

function calculateCreatinineClearance($age, $weight, $serumCreatinine, $sex) {
    
    if ($age <= 0 || $weight <= 0 || $serumCreatinine <= 0) {
        return "Invalid input. All values must be greater than zero. &#128039";
    }

    // Cockcroft-Gault or CrCl formula for men
    $crCl = ((140 - $age) * $weight) / (72 * $serumCreatinine);

    // Values for women are adjusted by multiplying by 0.85
    if (strtolower($sex) === "female") {
        $crCl *= 0.85;
    }
    
    // Round to 2 decimal places
    return round($crCl, 2); 
   
}

?>

