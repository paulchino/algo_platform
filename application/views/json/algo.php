{
    "easy": [
        {
            "id": "100",
            "title": "1 to 255",
            "description": "Add all the numbers from 1 to 255",
            "answer": 32640,
            "placeholder": "function sumNum() { return sum}",
            "type": "number"
        },
        {
            "id": "101",
            "title": "Reverse Array",
            "description": "Given the array [2,3,12,100]. Return the reverse of the array.",
            "answer": [100,12,3,2],
            "placeholder": "function revArr() {  return arr}",
            "type": "array"
        },
        {
            "id": "102",
            "title": "Sum",
            "description": "Given the array [1,12,32,-4], return the sum of all the values in the array",
            "answer": 41,
            "placeholder": "function arrSum() { return sum}",
            "type": "number"
        },
        {
            "id": "103",
            "title": "Test",
            "description": "Test question. Return the value 'test.'",
            "answer": "test",
            "placeholder": "function testStr() { return str}",
            "type": "string"
        }
    ],
    "medium": [
        {
            "id": "200",
            "title": "Function - Sum array.",
            "description": "Write a function that takes an array as an argument and sums all the values in an array. The values will only be numbers. (ex. [1,2] should return 3, [0,-1,1,] should return 0 ",
            "answer": "",
            "placeholder": "function sumArray(arr) { return sum}",
            "type": "function",
            "test_cases": [
            		[1,2,3],
            		[0],
            		[3,2,1,1]
            	],
            "test_output": [
            		6,
            		0,
            		7
            		]  

        },
        {
            "id": "201",
            "title": "Reverse Array",
            "description": "Write a function that takes an array and returns an array in reverse order. (ex. [1,2] should return [2,1])",
            "answer": "",
            "placeholder": "function arrRev(array) { return arr}",
            "type": "function",
            "test_cases": [
            		[1,2,3],
            		[0],
            		[3,2,1]
            	],
            "test_output": [
            		[3,2,1],
            		[0],
            		[1,2,3]
            	]            
        },
        {
            "id": "202",
            "title": "Add 5",
            "description": "Write a function that takes an array and return an array where value is 5 greater. The array values will only be numbers. (ex. [1,2,3] will return [6,7,8], [0] will return [5]",
            "answer": "",
            "placeholder": "function addFive(array) { return arr}",
            "type": "function",
            "test_cases": [
            		[1,2,3],
            		[0],
            		[-1,0,2]
            	],
            "test_output": [
            		[6,7,8],
            		[5],
            		[4,5,7]
            	]                
        },
        {
            "id": "203",
            "title": "Find E",
            "description": "Write a function that takes a string and returns the number of letter 'e' or 'E' in the string. (ie. 'Hello Earl' should return 2)",
            "answer": "",
            "placeholder": "function findE() { return count}",
            "type": "function",
             "test_cases": [
            		"hello Earl",
            		"EEeeaaaa    eE",
            		"abc"
            	],
            "test_output": [
            		2,
            		6,
            		0
            	]       
        }
    ],
    "hard": [
        {
            "id": "200",
            "title": "Function - Sum array.",
            "description": "Write a function that takes an array as an argument and sums all the values in an array. The values will only be numbers. (ex. [1,2] should return 3, [0,-1,1,] should return 0 ",
            "answer": "",
            "placeholder": "function sumArray(arr) { return sum}",
            "type": "function",
            "test_cases": [
                    [1,2,3],
                    [0],
                    [3,2,1,1]
                ],
            "test_output": [
                    6,
                    0,
                    7
                    ]  

        },
        {
            "id": "201",
            "title": "Reverse Array",
            "description": "Write a function that takes an array and returns an array in reverse order. (ex. [1,2] should return [2,1])",
            "answer": "",
            "placeholder": "function arrRev(array) { return arr}",
            "type": "function",
            "test_cases": [
                    [1,2,3],
                    [0],
                    [3,2,1]
                ],
            "test_output": [
                    [3,2,1],
                    [0],
                    [1,2,3]
                ]            
        },
        {
            "id": "202",
            "title": "Add 5",
            "description": "Write a function that takes an array and return an array where value is 5 greater. The array values will only be numbers. (ex. [1,2,3] will return [6,7,8], [0] will return [5]",
            "answer": "",
            "placeholder": "function addFive(array) { return arr}",
            "type": "function",
            "test_cases": [
                    [1,2,3],
                    [0],
                    [-1,0,2]
                ],
            "test_output": [
                    [6,7,8],
                    [5],
                    [4,5,7]
                ]                
        },
        {
            "id": "203",
            "title": "Find E",
            "description": "Write a function that takes a string and returns the number of letter 'e' or 'E' in the string. (ie. 'Hello Earl' should return 2)",
            "answer": "",
            "placeholder": "function findE() { return count}",
            "type": "function",
             "test_cases": [
                    "hello Earl",
                    "EEeeaaaa    eE",
                    "abc"
                ],
            "test_output": [
                    2,
                    6,
                    0
                ]       
        }
    ]
}