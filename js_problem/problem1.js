const firstArray = [1, 3, 6, 2, 4];
const secondArray = [2,0, 4, 1,2];
const sumArray = [];
for (let index = 0; index < firstArray.length; index++) {
   sumArray[index] = firstArray[index]+ secondArray[index];
    
}
 
const finalArray = [];
for (let index = 0; index < sumArray.length; index++) {
        for (let index1 = 0; index1 < sumArray.length-1; index1++) {
          
                    if(sumArray[index]==finalArray[index1]){
                        break;
                    }
                    finalArray.push(sumArray[index]);
                    break;           
        }  
}
// let demo = document.getElementById('array');
let demo = "";
 for (let index = 0; index < finalArray.length; index++) {
   demo += finalArray[index]+" ";
     
 }
 document.getElementById('array').innerHTML = demo;