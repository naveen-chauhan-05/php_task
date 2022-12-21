const fruitDb = ["apple", "bnana", "orange", "pineapple", "grapes", "avacodo", "strawberry"];

function filterFruit(fruiDb){
 
const mixFruit = ["grapes", "cabbage", "tomato", "bnana"];
 
const onlyFruit =[];
for (let index = 0; index < fruiDb.length; index++) {
  for (let index1 = 0; index1 < mixFruit.length; index1++) {
        if(mixFruit[index1]==fruiDb[index])
         onlyFruit.push(mixFruit[index1]);
  }
    
}
return onlyFruit;
}
 const answer = filterFruit(fruitDb);
  let ans = "";
for (let index = 0; index < answer.length; index++) {
  
  ans += answer[index]+" ";
}
document.getElementById('second').innerHTML = ans;