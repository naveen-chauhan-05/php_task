const fruitDb = ["apple", "bnana", "orange", "pineapple", "grapes", "avacodo", "strawberry"];

function filterFruit(fruiDb){
console.log(fruitDb);
const mixFruit = ["grapes", "cabbage", "tomato", "bnana"];
console.log(mixFruit);
const onlyFruit =[];
for (let index = 0; index < fruiDb.length; index++) {
  for (let index1 = 0; index1 < mixFruit.length; index1++) {
        if(mixFruit[index1]==fruiDb[index])
         onlyFruit.push(mixFruit[index1]);
  }
    
}
return onlyFruit;
}
 console.log(filterFruit(fruitDb));