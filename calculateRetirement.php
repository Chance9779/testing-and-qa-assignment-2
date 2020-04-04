<!DOCTYPE HTML>  
<html>
<head>
<style>
</style>
</head>
<body>  

<h2>Retirement Calculator</h2>

<button onClick="javascript:window.location.href='/index.php'">Go Back Home</button>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<div>
<input name="age" placeholder="Must be an integer">Your age</input>
<div>
<input name="salary" placeholder="Must be an integer">Your annual salary</input>
<div>
<input name="savingsPercentage">Your savings percentage</input>
<div>
<input name="goal">Your savings goal</input>
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
    $age = $_POST["age"];
    $salary = $_POST["salary"];
    $savingsPercentage = $_POST["savingsPercentage"];
    $goal = $_POST["goal"];
    if(empty($_POST["goal"])){
        $errorNumber = 1;
        array_push($errorArray, "goal cannot be empty or 0");
    }
    if(!isset($age)){
        $errorNumber = 1;
        array_push($errorArray, "age cannot be empty or 0");
    }
    if(empty($_POST["salary"])){
        $errorNumber = 1;
        array_push($errorArray, "salary cannot be empty or 0");
    }
    if(empty($_POST["savingsPercentage"])){
        $errorNumber = 1;
        array_push($errorArray, "savings percentage cannot be empty or 0");
    }

    if(!settype($age, "integer")){
        $errorNumber = 1;
        array_push($errorArray, "age has to be an integer");
    }
    if(!settype($salary, "float")){
        $errorNumber = 1;
        array_push($errorArray, "salary has to be an float");
    }
    if(!settype($goal, "float")){
        $errorNumber = 1;
        array_push($errorArray, "goal has to be an integer or float");
    }
    if(!settype($savingsPercentage, "float")){
        $errorNumber = 1;
        array_push($errorArray, "savings percentage has to be an integer or float");
    }


    if($errorNumber == 0){
        $retirementArray = calculateRetirement($age, $salary, $goal, $savingsPercentage);
        $yearsLeft = $retirementArray[0];
        $result = $retirementArray[1];
        echo "Years Left: " . $yearsLeft. "<div>" . "Will you get there before you turn 100? " . $result;
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
