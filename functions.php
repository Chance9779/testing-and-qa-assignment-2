<?php


function bmi_test($expectedIndex, $bmi, $expectedResult, $result) {
    if($expectedIndex != $bmi) {
        echo "BMI test fail: expected = " . $expectedIndex;
        echo "result = " . $bmi;
    }
    elseif($expectedResult != $result){
        echo "BMI test fail: expected = " . $expectedResult;
        echo "result = " . $result;
    }
    else {
        echo "BMI test success!";
    }
    }

function retirement_test($expectedYears, $actualYears, $expectedGoalMet, $goalMet) {
    if($expectedYears != $actualYears) {
        echo "retirement test years fail: expected = " . $expectedYears;
        echo "result = " . $actualYears;
    }
    elseif($expectedGoalMet != $goalMet) {
        echo "retirement test goal met fail: expected = " . $expectedGoalMet;
        echo "result = " . $goalMet;
    }
    else {
        echo "Retirement test success!";
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

    $yearsA, $goalMetA = calculateRetirement($age, $salary, $goal, $savingsPercentageA);
    $yearsB, $goalMetB = calculateRetirement($age, $salary, $goal, $savingsPercentageB);
    $yearsC, $goalMetC = calculateRetirement($age, $salary, $goal, $savingsPercentageC);

    retirement_test($expectedYearsA, $yearsA, $expectedGoalMetA, $goalMetA);
    retirement_test($expectedYearsB, $yearsB, $expectedGoalMetB, $goalMetB);
    retirement_test($expectedYearsC, $yearsC, $expectedGoalMetC, $goalMetC);
}




function performBMItests() {
    $feet = 5.0;
    $inches = 60;

    $expectedBMIa = 18.4;
    $poundsA = 18.5;
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
    $expecedResultb = "Normal";
    $expectedResultc = "Normal";
    $expectedResultd = "Overweight";
    $expectedResulte = "Overweight";
    $expectedResultf = "Obese";

    $BMIa, $resultA = calculateBMI($feet, $inches, $poundsA);
    $BMIb, $resultB = calculateBMI($feet, $inches, $poundsB);
    $BMIc, $resultC = calculateBMI($feet, $inches, $poundsC);
    $BMId, $resultD = calculateBMI($feet, $inches, $poundsD);
    $BMIe, $resultE = calculateBMI($feet, $inches, $poundsE);
    $BMIf, $resultF = calculateBMI($feet, $inches, $poundsF);

    bmi_test($expectedBMIa, $BMIa, $expectedResulta, $resultA);
    bmi_test($expectedBMIb, $BMIb, $expectedResultb, $resultB);
    bmi_test($expectedBMIc, $BMIc, $expectedResultc, $resultC);
    bmi_test($expectedBMIe, $BMIe, $expectedResulte, $resultE);
    bmi_test($expectedBMIf, $BMIf, $expectedResultf, $resultF);




}

?>
