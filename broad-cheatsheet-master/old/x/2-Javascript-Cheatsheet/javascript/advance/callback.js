/**
 * CALLBACK
 * 
 * function that is passed as an argument to another function
 */
let add = (num1, num2, callback) => {
    let result = callback(num1,num2);
    alert(result);
};

add(1,2,function(num1,num2){
return num1+num2;
});