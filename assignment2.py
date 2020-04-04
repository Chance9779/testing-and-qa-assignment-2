
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

"""
Retirement -
 Input user's current age, annual 
salary, percentage saved (employer 
matches 35% of savings). Input desired re
tirement savings goal. Output what age 
savings goal will be met. You can assume d
eath at 100 years (therefore, indicate if the 
savings goal is not met). 
"""

def retirement_test(expectedYears, actualYears, expectedGoalMet, goalMet):
    if (expectedYears != actualYears):
        print("retirement test years fail: expected = ", expectedYears)
        print("result = ", actualYears)
    elif(expectedGoalMet != goalMet):
        print("retirement test goal met fail: expected = ", expectedGoalMet)
        print("result = ", goalMet)
    else:
        print("Retirement test success!")

def performRetirementTests():
    """
    Test cases:
    we're going to assume an age of 25 and a salary of 100,000
    percentage saved will be changed, and that should effect the result
    35% of the savings should be matched by the employer and added to the savings
    We want to have 1,000,000 saved up for retirement.  So let's see if we can do that

    If we save 20% of our salary, our employer will match 35% (7000) so that would be 20k plus 7k, 27k a year
    1,000,000 / 27k = 37 years
    25 + 37 = 62 when our savings goal would be met

    If we save 10% of our salary, our employer will match 35% (3500) so 10k plus 3500, 13,500
    1,000,000 / 13,500 = 74 years
    25 + 74 = 99! getting close there.  

    Last test case will not allow us to meet our goal, so 5%
    saving 5% of our salary, plus 35% is 5k + 1750 = 6750
    1,000,000 / 6750 = 148 years!
    25 + 148 = 173, we'll be long gone and our savings goal not met.

    """

    age = 25
    salary = 100000.0
    goal = 1000000.0


    savingsPercentageA = 20
    savingsPercentageB = 10
    savingsPercentageC = 5

    expectedYearsA = 37
    expectedYearsB = 74
    expectedYearsC = 148

    expectedGoalMetA = "Yes"
    expectedGoalMetB = "Yes"
    expectedGoalMetC = "No"

    yearsA, goalMetA = calculateRetirement(age, salary, goal, savingsPercentageA)
    yearsB, goalMetB= calculateRetirement(age, salary, goal, savingsPercentageB)
    yearsC, goalMetC = calculateRetirement(age, salary, goal, savingsPercentageC)

    retirement_test(expectedYearsA, yearsA, expectedGoalMetA, goalMetA)
    retirement_test(expectedYearsB, yearsB, expectedGoalMetB, goalMetB)
    retirement_test(expectedYearsC, yearsC, expectedGoalMetC, goalMetC)



def performBMItests():
    """
    In this we will test boundaries of the different BMI
    categories.

    Every test will use the following 
    5'0".  5 feet.  60 inches.

    Here are the tests:
    at 92 pounds, the BMI should be underweight at 18.4
    at 92.5 pounds, the BMI should be normal at 18.5
    at 124.5 pounds, the BMI should be normal at 24.9
    at 125 pounds, the BMI should be overweight at 25.0
    at 149.5 pounds, the BMI should be overweight at 29.9
    at 150 pounds, the BMI should be obese at 30.

    """
    feet = 5
    inches = 60

    expectedBMIa = 18.4
    poundsA = 92
    expectedBMIb = 18.5
    poundsB = 92.5
    expectedBMIc = 24.9
    poundsC = 124.5
    expectedBMId = 25.0
    poundsD = 125.0
    expectedBMIe = 29.9
    poundsE = 149.5
    expectedBMIf = 30.0
    poundsF = 150.0

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

    print("")
    print("")
    bmi_test(expectedBMIa, BMIa, expectedResulta, resultA)
    bmi_test(expectedBMIb, BMIb, expectedResultb, resultB)
    bmi_test(expectedBMIc, BMIc, expectedResultc, resultC)
    bmi_test(expectedBMId, BMId, expectedResultd, resultD)
    bmi_test(expectedBMIe, BMIe, expectedResulte, resultE)
    bmi_test(expectedBMIf, BMIf, expectedResultf, resultF)
    print("")
    print("")




#this will calculate your BMI
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


def calculateRetirement(age, salary, goal, savingsPercentage):
    #calculate percentage
    a = savingsPercentage / 100
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



def gui():
    while True:
        print ("Hi! welcome to our application.")
        print ("")
        print("Would you like to: ")
        print("press 1: calculate BMI")
        print("press 2: calculate retirement age")
        print("press 3: exit")
        print("press * to see tests")
        userInput = input("type here and press enter: ")
        #bmi
        if (userInput == "1"):
            while True:
                feet = input("Please type your height in feet: ")
                inches = input("Please type your height in inches: ")
                pounds = input("Please type your weight in pounds: ")
                try:
                    feet = float(feet)
                    inches = float(inches)
                    pounds = float(pounds)
                except:
                    print("I'm sorry, some of those values weren't whole numbers")
                    continue
                bmi, result = calculateBMI(feet, inches, pounds)
                print("Your bmi is ", bmi, "which is ", result)

                break

        #retirement
        elif (userInput == "2"):
            while True:
                age = input("Please input your age: ")
                salary = input("Please input your annual salary: ")
                goal = input("Please input your retirement goal: ")
                savings = input("Please input the percentage of your salary you save each year: ")
                try:
                    age = int(age)
                    salary = float(salary)
                    goal = float(goal)
                    savings = float(savings)
                except:
                    print("Sorry, those numbers were not accepted.  Please try again.")
                    continue
                yearsLeft, goalMet = calculateRetirement(age, salary, goal, savings)
                print("You have", yearsLeft, "until your goal is met.")
                print("Is your goal going to be met by when you're 100 years old?", goalMet)
                print("Thank you!")
                print("")
                break
            
        #exit
        elif (userInput == "3"):
            exit()
        elif(userInput == "*"):
            performBMItests()
            print("")
            print("")
            print("")
            performRetirementTests()
            print("")
            print("")
            print("")
            continue
        #don't understand
        else:
            print("we didn't understand that.")
            continue


gui()
        