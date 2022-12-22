console.log("problem is running");

 const empList = [{
     name: 'Jhon Doe',
     dep: 'php',
    empId: 5
 },
 
 {
     name: 'Paul Smith',
     dep: 'MERN',
     empId: 4
 },
 {
 name: 'Tom Smith',
 dep: 'SEO',
 empId: 7
 } 
];
empList.sort(function(a, b){
    return a.empId - b.empId;
});
// console.log("new for using itretor");
for(const iterator of empList){
console.log(iterator);
}
 

let text1 = "";
for (const iterator of empList) {
  text1 += "{ name: "+iterator.name+"<br> dep: "+iterator.dep+"<br> empid: "+iterator.empId+"<br>}<br>";
}
document.getElementById('problem2').innerHTML = text1;