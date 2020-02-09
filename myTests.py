
"""
Requirements 
Command Line Interface - Develop a command lin
e app that prompts the user to select a 
function to execute and allows the user to 
gracefully exit the app when desired. The menu 
should be displayed after each function (although 
a GUI is not required, you are permitted to 
create one) unless the user exit
s. For now, the app must have 
the following functionalities. 
1.
Body Mass Index -
 Input height in feet and inches
. Input weight in pounds. Return 
BMI value and category: Underweight
 = <18.5; Normal weight = 18.5–24.9; 
Overweight = 25–29.9; Obese = BMI of 30 or 
greater (see formula linked in the Notes 
& Resources section). 
2.Retirement -
 Input user's current age, annual 
salary, percentage saved (employer 
matches 35% of savings). Input desired re
tirement savings goal. Output what age 
savings goal will be met. You can assume d
eath at 100 years (therefore, indicate if the 
savings goal is not met).  """

#test the bmi by checking the result by the expected
def bmi_test (expectedIndex, bmi, expectedResult, result):
    if (expectedIndex != bmi):
        print("BMI test fail: expected = ", expectedIndex)
        print("result = ", bmi)
    elif(expectedResult != result):
        print("BMI test fail: expected = ", expectedResult)
        print("result = ", result)
    else:
        print("BMI test success!")


def retirement_test(expected, result):
    if (expected != result):
        print("retirement test fail: expected = ", expected)
        print("result = ", result)
    else:
        print("BMI test success!")


def performBMItests():
    """
    In this we will test boundaries of the different BMI
    categories.

    Every test will use the following 
    5'0".  5 feet.  60 inches.

    Here are the tests:
    at 94 pounds, the BMI should be underweight at 18.4
    at 95 pounds, the BMI should be normal at 18.6
    at 127 pounds, the BMI should be normal at 24.9
    at 129 pounds, the BMI should be overweight at 25.0
    at 153 pounds, the BMI should be overweight at 29.9
    at 154 pounds, the BMI should be obese at 30.

    """
    feet = 5
    inches = 60

    expectedBMIa = 18.4
    poundsA = 94
    expectedBMIb = 18.6
    poundsB = 95
    expectedBMIc = 24.9
    poundsC = 127
    expectedBMId = 25.0
    poundsD = 129
    expectedBMIe = 29.9
    poundsE = 153
    expectedBMIf = 30.0
    poundsF = 154

    expectedResulta = "Underweight"
    expectedResultb = "Normal"
    expectedResultc = "Normal"
    expectedResultd = "Overweight"
    expectedResulte = "Overweight"
    expectedResultf = "Obese"

    BMIa, resultA = calculateBMI(feet, inches, poundsA)
    BMIb, resultB = calculateBMI(feet, inches, poundsB)
    BMIc, resultC = calculateBMI(feet, inches, poundsC)
    BMId, resultD = calculateBMI(feet, inches, poundsD)
    BMIe, resultE = calculateBMI(feet, inches, poundsE)
    BMIf, resultF = calculateBMI(feet, inches, poundsF)

    bmi_test(expectedBMIa, BMIa, expectedResulta, resultA)
    bmi_test(expectedBMIb, BMIb, expectedResultb, resultB)
    bmi_test(expectedBMIc, BMIc, expectedResultC, resultC)
    bmi_test(expectedBMId, BMId, expectedResultd, resultD)
    bmi_test(expectedBMIe, BMIe, expectedResulte, resultE)
    bmi_test(expectedBMIf, BMIf, expectedResultf, resultF)
















    
