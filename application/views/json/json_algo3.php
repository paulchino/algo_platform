{
    "data": [
        {
            "id": 401,
            "title": "Print 1-255",
            "description": "Write a function that would return the sum of all the numbers from 1 to 255. (ex. 1+2+3+..+245+255)",
            "answer": 32640,
            "placeholder": "function print1_255() { return sum }",
            "type": "number",
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 402,
            "title": "Print Sum",
            "description": "Write a function that would sum all the numbers odd numbers from 1 to 5000. (ex. 1+3+5+...+4997+4999)",
            "answer": 6250000,
            "placeholder": "function printSum() { return sum }",
            "type": "number",
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 403,
            "title": "Odd Numbers",
            "description": "Write a function that would return all the an array of all odd numbers between 1 to 100. (ex. [1,3,5, .... , 97,99]). Hint: Use 'push' method.",
            "answer": [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49, 51, 53, 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81, 83, 85, 87, 89, 91, 93, 95, 97, 99],
            "placeholder": "function oddNumbers() { return arr }",
            "type": "number",
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 404,
            "title": "Iterate through the array",
            "description": "Write a function that takes an array as an argument and iterates throught each member of the array and returns the sum of all the values. Being able to loop through each member of the array is extremely important. Do this over and over (under 2 minutes) before moving on to the next algorithm challenge. (Test cases: [0] returns 0, [1,2,5] returns 8, [-5,2,5,12] returns 14)",
            "answer": "",
            "placeholder": "function iterArr(arr) { return sum }",
            "type": "function",
            "test_cases": [
                    [0],
                    [1,2,5],
                    [-5,2,5,12]
                ],
            "test_output": [
                    0,
                    8,
                    14
                    ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"          
        },
        {
            "id": 405,
            "title": "Find Max",
            "description": "Given an array with multiple values (e.g. [-3, 3, 5, 7]), write a program that prints the maximum number in the array. (The best way to do this is to have the computer go through each number, one at a time, and to update the value in a variable called 'maximum' (or whatever you want to name the variable);  imagine that if I gave you no number and asked you what a maximum number is.  What would you say?  Say the first number I gave you was -3 and asked you what a maximum number is.  What would you say? Say the next number I gave you was 3 and asked you again what a maximum number now is.  What would you say?  Have the computer imitate this behavior of updating the maximum number as you iterate through each number in the array).  Again you're not to use any of the pre-built functions ",
            "answer": "",
            "placeholder": "function findMax(arr) { return max }",
            "type": "function",
            "test_cases": [
                    [0,-2,8],
                    [300,2,200,5],
                    [1]
                ],
            "test_output": [
                    8,
                    300,
                    1
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 406,
            "title": "Find Average",
            "description": "Given an array with multiple values (e.g. [1,3,5,7,20]), write a program that prints the average of the values in the array.  Again you're not to do this by using of any of the pre-built functions in Javascript.  Again iterate through each number in the array and update the 'average' as the program retrieves each number in the array.",
            "answer": "",
            "placeholder": "function findAvg(arr) { return avg }",
            "type": "function",
            "test_cases": [
                    [0,0,0],
                    [1,3,5,7,20],
                    [-3,4,8]
                ],
            "test_output": [
                    0,
                    7.2,
                    3
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 408,
            "title": "Greater than Y",
            "description": "Write a program that takes an array and returns the number of values in that array whose value is greater than y. For example if array = [1,3, 5, 7] and y = 3, after your program is run it will print 2 (since there are two values in the array whose value is greater than 3).  Again make sure you come up with a simple base case and write instructions to solve that base case first and then test your instructions for other complicated cases. You can use a count function with this assignment.",
            "answer": "",
            "placeholder": "function greaterY(arr, Y) { return count }",
            "type": "function",
            "test_cases": [
                    [ [1,2,5], 1 ],
                    [ [1,3,5,7,20], 12 ],
                    [ [-1], 0 ]
                ],
            "test_output": [
                    2,
                    1,
                    0
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 409,
            "title": "Square the Values",
            "description": "Given an array x (e.g. [1,5, 10, -2]), create an algorithm (sets of instructions) that squares each value in the array.  When the program is done x should have values that have been squared (e.g. [1, 25, 100, 4]).  You're not to use any of the pre-built function in Javascript.  You could for example square the value by saying x[i] = x[i] * x[i];",
            "answer": "",
            "placeholder": "function squareVal(arr) { return sqarr }",
            "type": "function",
            "test_cases": [
                    [1,2,3],
                    [-1,3,6],
                    [0]
                ],
            "test_output": [
                    [1,4,9],
                    [1,9,36],
                    [0]
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 410,
            "title": "Eliminate Negative Numbers",
            "description": "Given an array x (e.g. [1,5, 10, -2]), create an algorithm (sets of instructions) that replaces any negative number with the value of 0.  When the program is done x should have no negative values (e.g. [1, 5, 10, 0]).",
            "answer": "",
            "placeholder": "function noNeg(arr) { return noneg }",
            "type": "function",
            "test_cases": [
                    [1,2,-3,3],
                    [-1,3,6],
                    [0]
                ],
            "test_output": [
                    [1,2,0,3],
                    [0,3,6],
                    [0]
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 411,
            "title": "Max, Min, and Average",
            "description": "Given an array x (e.g. [1,5, 10, -2]), create an algorithm (sets of instructions) that returns an array with the max, min, and average values ([max, min, avg]. ex [0,2,4] should return [4,0,3]).",
            "answer": "",
            "placeholder": "function maxMinAvg(arr) { return arrnew }",
            "type": "function",
            "test_cases": [
                    [0,2,4],
                    [1,5,10,-2],
                    [0]
                ],
            "test_output": [
                    [4,0,3],
                    [10,-2,4],
                    [0,0,0]
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 412,
            "title": "Swap values in the array",
            "description": "Write a function that takes an array as an argument and return an array with the first and last values swapped. The array will have a minimum length of 2 (ex. [1,5,10,-2] should return [-2,5,10,1]).",
            "answer": "",
            "placeholder": "function swap(arr) { return arrnew }",
            "type": "function",
            "test_cases": [
                    [0,2,4],
                    [1,5,10,-2],
                    [10,20]
                ],
            "test_output": [
                    [4,2,0],
                    [-2,5,10,1],
                    [20,10]
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        },
        {
            "id": 413,
            "title": "Number to String",
            "description": "Write a function that takes an array of numbers and replaces any number that's negative to a string call 'Dojo'. For example if array = [-1,-3,2] should return ['Dojo', 'Dojo', 2]",
            "answer": "",
            "placeholder": "function numToStr(arr) { return arrnew }",
            "type": "function",
            "test_cases": [
                    [-1,-3,2],
                    [0],
                    [-2,3,-1]
                ],
            "test_output": [
                    ["Dojo","Dojo",2],
                    [0],
                    ["Dojo",3,"Dojo"]
                ],
            "sample_answer_url": "http://player.vimeo.com/video/117467244",
            "sample_answer_creator": "Michael Choi:Chief Instructor, Founder"
        }
        ]
}