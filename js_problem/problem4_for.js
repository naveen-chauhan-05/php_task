console.log("problem is running");
 const empList1 = [{
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
let empRule=[];
for(let i =0; i<empList1.length-1; i++){
    
        for (let index = 0; index < empList1.length-i-1; index++) {
            if(empList1[index].empId > empList1[index+1].empId){
             empRule[index] = empList1[index];
             empList1[index] = empList1[index+1];
             empList1[index+1] =  empRule[index];
            
            }
        }
       
    
    }
    for (const iterator of empList1) {
        console.log(iterator);
    }
let text = "";
 for (const iterator of empList1) {
   text += "{ name: "+iterator.name+"<br> dep: "+iterator.dep+"<br> empid: "+iterator.empId+"<br>}<br>";
 }
 document.getElementById('problem').innerHTML = text;