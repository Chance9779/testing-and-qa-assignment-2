<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
</head>
<body>  

<h2>BMI Calculator</h2>

<button onClick="javascript:window.location.href='/index.php'">Go Back Home</button>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div>
<input name="feet" placeholder="Must be an integer">Feet</input>
<div>
<input name="inches" placeholder="Must be an integer">Inches</input>
<div>
<input name="pounds">Pounds</input>
<div>
<button type="submit" name="Submit">Submit</button>
</form>
<div>
<p>
<?php

include "functions.php";

/*

*/
$errorArray = array();
$errorNumber = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $feet = $_POST["feet"];
    $inches = $_POST["inches"];
    $pounds = $_POST["pounds"];
    if(empty($_POST["feet"])){
        $errorNumber = 1;
        array_push($errorArray, "Feet cannot be empty or 0");
    }
    if(!isset($inches)){
        $errorNumber = 1;
        array_push($errorArray, "inches cannot be empty or 0");
    }
    if(empty($_POST["pounds"])){
        $errorNumber = 1;
        array_push($errorArray, "Pounds cannot be empty or 0");
    }

    if(!settype($feet, "integer")){
        $errorNumber = 1;
        array_push($errorArray, "Feet has to be an integer");
    }
    if(!settype($inches, "integer")){
        $errorNumber = 1;
        array_push($errorArray, "Inches has to be an integer");
    }
    if(!settype($pounds, "integer")){
        $errorNumber = 1;
        array_push($errorArray, "Pounds has to be an integer or float");
    }


    if($errorNumber == 0){
        $bmiArray = calculateBMI($feet, $inches, $pounds);
        $bmi = $bmiArray[0];
        $result = $bmiArray[1];
        echo "BMI: " . $bmi . "<div>" . "Result: " . $result;
    }
    else{
        foreach($errorArray as $error){
            echo "<div>" . "ERROR: " . $error . "<div>";
        }
    }
    

        
}

?>
</p>
</div>


</body>
</html>
