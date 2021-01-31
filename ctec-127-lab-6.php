<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Lab No. 6 - Temp. Converter</title>
</head>

<body>

    <?php
     
    
    // function to calculate converted temperature
    function convertTemp($temp, $unit1, $unit2)
    {
        // conversion formulas
        // Celsius to Fahrenheit = T(°C) × 9/5 + 32
        // Celsius to Kelvin = T(°C) + 273.15
        // Fahrenheit to Celsius = (T(°F) - 32) × 5/9
        // Fahrenheit to Kelvin = (T(°F) + 459.67)× 5/9
        // Kelvin to Fahrenheit = T(K) × 9/5 - 459.67
        // Kelvin to Celsius = T(K) - 273.15
        
        
        

        // Conversion statement
    if (is_numeric($temp)) {
        if ($unit1 == 'fahrenheit' && $unit2 == 'celsius'){
            $temp = ($temp - 32) * (5/9);
        } elseif ($unit1 == 'fahrenheit' && $unit2 == 'kelvin'){
            $temp = ($temp + 459.67) * (5/9);
        } elseif ($unit1 == 'celsius' && $unit2 == 'fahrenheit'){
            $temp = $temp * (9/5) + 32;
        } elseif ($unit1 == 'celsius' && $unit2 == 'kelvin'){
            $temp = $temp + 273.15;
        } elseif ($unit1 == 'kelvin' && $unit2 == 'fahrenheit'){
            $temp = ($temp * (9/5)) - 459.67;
        } elseif ($unit1 == 'kelvin' && $unit2 == 'celsius'){
            $temp = $temp - 273.15;
        } else {
            echo "<h1>*********************OOPS!***********************</h1><h2> Please choose a numeric value for the temperature and select BOTH units of measurement.</h2>";
        }
    } else {
        echo "<h1>*********************OOPS!***********************</h1><h2> Please choose a numeric value for the temperature and select BOTH units of measurement.</h2>";
    }
        return $temp;
        
    }
    // end function
    
    // Logic to check for POST and grab data from $_POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Store the original temp and units in variables
        // You can then use these variables to help you make the form sticky
        // then call the convertTemp() function
        // Once you have the converted temperature you can place PHP within the converttemp field using PHP
        // I coded the sticky code for the originaltemp field for you

        $originalTemperature = $_POST['originaltemp'];
        $originalUnit = $_POST['originalunit'];
        $conversionUnit = $_POST['conversionunit'];
        $convertedTemp = convertTemp($originalTemperature, $originalUnit, $conversionUnit);

    } // end if
    else {
        $originalUnit = NULL;
        $conversionUnit = NULL;
    }



    ?>
    <!-- Form starts here -->
    <h1>Temperature Converter</h1>
    <h4>CTEC 127 - PHP with SQL 1</h4>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <div class="group">
            <label for="temp">Temperature</label>
            <input type="text" value="<?php if(isset($originalTemperature)){
                                            echo $originalTemperature;
                                        }
                                        ?>" name="originaltemp" size="14" maxlength="7" id="temp">

            <select name="originalunit">
                <option value="--Select--"<?= $originalUnit == "--Select--" ? "selected" : null ?>>--Select--</option>
                <option value="celsius"<?= $originalUnit == "celsius" ? "selected" : null ?>>Celsius</option>
                <option value="fahrenheit"<?= $originalUnit == "fahrenheit" ? "selected" : null ?>>Fahrenheit</option>
                <option value="kelvin"<?= $originalUnit == "kelvin" ? "selected" : null ?>>Kelvin</option>
            </select>
        </div>

        <div class="group">
            <label for="convertedtemp">Converted Temperature</label>
            <input type="text" value="" name="convertedtemp" size="14" maxlength="7" id="convertedtemp" disabled>

            <select name="conversionunit">
                <option value="--Select--"<?= $conversionUnit == "--Select--" ? "selected" : null ?>>--Select--</option>
                <option value="celsius"<?= $conversionUnit == "celsius" ? "selected" : null ?>>Celsius</option>
                <option value="fahrenheit"<?= $conversionUnit == "fahrenheit" ? "selected" : null ?>>Fahrenheit</option>
                <option value="kelvin"<?= $conversionUnit == "kelvin" ? "selected" : null ?>>Kelvin</option>
            </select>
        </div>
        <input type="submit" value="Convert" />
    </form>
</body>

</html>