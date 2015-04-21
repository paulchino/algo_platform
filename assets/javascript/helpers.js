//alert('hi');
function randomSelector(array, number) {
    var arr = [];
    while(arr.length < Math.min(number, array.length)) {
        var randomnumber = Math.floor(Math.random()*array.length);
        var found = false;
        for (var i=0; i<arr.length; i++) {
            if (arr[i] == randomnumber) {
                found = true;
                break
            }
        }
        if (!found) {
            arr[arr.length] = randomnumber
        }
    }
    return arr  
}

function randomQuestions(obj,level,number) {
    var arr = [];
    var randomIndex = randomSelector(obj[level], number);
    for(var i=0;i<randomIndex.length;i++) {
        arr.push(obj[level][randomIndex[i]]);
    }
    return arr
}

function appendQuestions(arr) {
    str = "<h2>Easy</h2><hr>";
    for(var i=0; i<arr.length;i++) {
        str += "<h3>" + arr[i].title + "</h3>" + 
                "<p>" + arr[i].description + "</p>" + 
                "<div id='editor" + i + "' class=code-box data-id=" + arr[i].id+ ">" + arr[i].placeholder + "</div>" ;
        if(i == 2) {
            str += "<h2>Intermediate</h2><hr>";
        }
        if(i == 4) {
            str += "<h2>Difficult</h2><hr>";
        }
    }
    return str
}

function getJsonObj(data, id) {
    for(var i = 0; i<data.length; i ++ ) {
        if (data[i].id == id) {
            return data[i];
        }
    }

}




// //alert('hi');
// console.log('hello');
// var questionHelpers = {
//     //function returns randomly selected indexes given an arrary
//     randomSelector: function(array, number) {
//         var arr = [];
//         while(arr.length < Math.min(number, array.length)) {
//             var randomnumber = Math.floor(Math.random()*array.length);
//             var found = false;
//             for (var i=0; i<arr.length; i++) {
//                 if (arr[i] == randomnumber) {
//                     found = true;
//                     break
//                 }
//             }
//             if (!found) {
//                 arr[arr.length] = randomnumber
//             }
//         }
//         return arr       
//     },

//     //returns an array of randomly selected questions
//     random: function(obj,level,number) {
//         var arr = [];
//         var randomIndex = this.randomSelector(obj[level], number);
//         for(var i=0;i<randomIndex.length;i++) {
//             arr.push(obj[level][randomIndex[i]]);
//         }
//         return arr
//     },

//     appendQuestion: function(arr) {
//         str = "<h2>Easy</h2><hr>";
//         for(var i=0; i<arr.length;i++) {
//             str += "<h3>" + arr[i].title + "</h3>" + 
//                     "<p>" + arr[i].description + "</p>" + 
//                     "<div id='editor" + i + "' class=code-box data-id=" + arr[i].id+ ">" + arr[i].placeholder + "</div>" ;
//             if(i == 2) {
//                 str += "<h2>Intermediate</h2><hr>";
//             }
//             if(i == 4) {
//                 str += "<h2>Difficult</h2><hr>";
//             }
//         }
//         return str
//     }
// };

