<?php


function bmi_test($expectedIndex, $bmi, $expectedResult, $result) {
    if($expectedIndex != $bmi) {
        echo "<div>\nBMI test fail: expected = " . $expectedIndex . "<br></div>";
        echo "<div>result = " . $bmi . "<br></div>";
    }
    elseif($expectedResult != $result){
        echo "<div>\nBMI test fail: expected = " . $expectedResult . "<br></div>";
        echo "<div>\nresult = " . $result . "<br></div>";
    }
    else {
        echo "<div>\nBMI test success!" . "<br></div>";
    }
    }

function retirement_test($expectedYears, $actualYears, $expectedGoalMet, $goalMet) {
    if($expectedYears != $actualYears) {
        echo "<div>retirement test years fail: expected = " . $expectedYears . "</div>";
        echo "<div>result = " . $actualYears . "</div>";
    }
    elseif($expectedGoalMet != $goalMet) {
        echo "<div>retirement test goal met fail: expected = " . $expectedGoalMet . "</div>";
        echo "<div>result = " . $goalMet . "</div>";
    }
    else {
        echo "<div>Retirement test success!</div>";
    }

    }


function performRetirementTests(){
    $age = 25;
    $salary = 100000.0;
    $goal = 1000000.0;

    $savingsPercentageA = 20;
    $savingsPercentageB = 10;
    $savingsPercentageC = 5;

    $expectedYearsA = 37;
    $expectedYearsB = 74;
    $expectedYearsC = 148;

    $expectedGoalMetA = "Yes";
    $expectedGoalMetB = "Yes";
    $expectedGoalMetC = "No";

    $a1 = calculateRetirement($age, $salary, $goal, $savingsPercentageA);
    $b1 = calculateRetirement($age, $salary, $goal, $savingsPercentageB);
    $c1 = calculateRetirement($age, $salary, $goal, $savingsPercentageC);
    $yearsA = $a1[0];
    $yearsB = $b1[0];
    $yearsC = $c1[0];

    $goalMetA = $a1[1];
    $goalMetB = $b1[1];
    $goalMetC = $c1[1];

    retirement_test($expectedYearsA, $yearsA, $expectedGoalMetA, $goalMetA);
    retirement_test($expectedYearsB, $yearsB, $expectedGoalMetB, $goalMetB);
    retirement_test($expectedYearsC, $yearsC, $expectedGoalMetC, $goalMetC);
}




function performBMItests() {
    $feet = 5.0;
    $inches = 60;

    $expectedBMIa = 18.4;
    $poundsA = 92;
    $expectedBMIb = 18.5;
    $poundsB = 92.5;
    $expectedBMIc = 24.9;
    $poundsC = 124.5;
    $expectedBMId = 25.0;
    $poundsD = 125.0;
    $expectedBMIe = 29.9;
    $poundsE = 149.5;
    $expectedBMIf = 30.0;
    $poundsF = 150.0;

    $expectedResulta = "Underweight";
    $expectedResultb = "Normal";
    $expectedResultc = "Normal";
    $expectedResultd = "Overweight";
    $expectedResulte = "Overweight";
    $expectedResultf = "Obese";

    $a = calculateBMI($feet, $inches, $poundsA);
    $b = calculateBMI($feet, $inches, $poundsB);
    $c = calculateBMI($feet, $inches, $poundsC);
    $d = calculateBMI($feet, $inches, $poundsD);
    $e = calculateBMI($feet, $inches, $poundsE);
    $f = calculateBMI($feet, $inches, $poundsF);

    $BMIa = $a[0];
    $BMIb = $b[0];
    $BMIc = $c[0];
    $BMId = $d[0];
    $BMIe = $e[0];
    $BMIf = $f[0];

    $resultA = $a[1];
    $resultB = $b[1];
    $resultC = $c[1];
    $resultD = $d[1];
    $resultE = $e[1];
    $resultF = $f[1];



    bmi_test($expectedBMIa, $BMIa, $expectedResulta, $resultA);
    bmi_test($expectedBMIb, $BMIb, $expectedResultb, $resultB);
    bmi_test($expectedBMIc, $BMIc, $expectedResultc, $resultC);
    bmi_test($expectedBMIe, $BMIe, $expectedResulte, $resultE);
    bmi_test($expectedBMIf, $BMIf, $expectedResultf, $resultF);




}

/*
def calculateBMI(feet, inches, pounds):
    #multiply the weight in pounds by 0.45
    a = pounds * 0.50
    #multiply the height in inches by 0.025
    b = inches * 0.25
    #square the result from step 2
    c = b * b
    #divide the answer from step 1 by the answer from step 3
    bmi = a / c
    bmi = round(bmi, 1)
    if (bmi < 18.5):
        result = "Underweight"
    elif(bmi >= 18.5 and bmi <= 24.9):
        result = "Normal"
    elif(bmi > 24.9 and bmi < 30):
        result = "Overweight"
    else:
        result = "Obese"
    return bmi, result

    */

function calculateBMI($feet, $inches, $pounds){
    $a = $pounds * 0.45;
    //echo "A: " . $a;
    $b = $inches * 0.025;
    //echo "B: " . $b;
    $c = $b * $b;
    //echo "C: " . $c;
    $bmi = $a/$c;
    //echo "BMI BEFORE: " . $bmi;
    $bmi = round($bmi, 1);
    //echo "BMI: " . $bmi;

    if ($bmi < 18.5){
        $result = "Underweight";
    }
    elseif($bmi >= 18.5 && $bmi <= 24.9){
        $result = "Normal";
    }
    elseif($bmi > 24.9 && $bmi < 30){
        $result = "Overweight";
    }
    else{
        $result = "Obese";
    }
    $a1 = array($bmi, $result);
    return $a1;

}
/*
def calculateRetirement(age, salary, goal, savingsPercentage):
    #calculate percentage
    a = savingsPercentage / 300
    savings = a * salary
    #calculate 35% of that
    employerSavings = savings * 0.35
    totalSavings = savings + employerSavings

    #calculate years left
    yearsLeft = goal/totalSavings
    yearsLeft = round(yearsLeft)

    if ((yearsLeft + age) >= 100):
        goalMet = "No"
    else:
        goalMet = "Yes"
    
    return yearsLeft, goalMet
    */

function calculateRetirement($age, $salary, $goal, $savingsPercentage){
    $a = $savingsPercentage / 100;
    $savings = $a * $salary;
    $employerSavings = $savings * 0.35;
    $totalSavings = $savings + $employerSavings;
    $yearsLeft = $goal/$totalSavings;
    $yearsLeft = round($yearsLeft);
    if (($yearsLeft + $age) >= 100){
        $goalMet = "No";
    }
    else{
        $goalMet = "Yes";
    }
    $a1 = array($yearsLeft, $goalMet);
    return $a1;
}

?>
