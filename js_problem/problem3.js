 function function1(){
     let firstDate = document.getElementById("date1").value;
    
     let secondDate = document.getElementById("date2").value;
 const d1 = new Date(firstDate);
 const d2 = new Date(secondDate);
 
     const diffTime = Math.abs(d2-d1);
     const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
    let finalDiff   = "";
     if(diffDays<30){
     finalDiff += diffDays+" days";
     }
  else if(diffDays>30 && diffDays<365){
    let month = Math.floor(diffDays/30);      
        finalDiff += month+" Month ";
            if(diffDays % 30 != 0){
                let days = diffDays % 30 ;
                 finalDiff += " or "+ days + " days ";
            }         
        }
         else{
             console.log("total Day "+diffDays);
             let year = Math.floor(diffDays/365);
             finalDiff += year + " Year ";
             if(diffDays % 365 != 0){
                        let onlyDays = diffDays % 365;
                        console.log( "remider day "+onlyDays);
                        if(onlyDays>30){
                            let month = Math.floor(onlyDays/30);
                            finalDiff += "or "+month+ " Month ";   
                            if(onlyDays % 30 != 0){
                                let days = onlyDays % 30 ;
                                finalDiff += " or "+ days + " days ";
                            }  
                 }
                 else{
                    finalDiff += " or "+ onlyDays+ " days";
                } 
             }

         }
         if(firstDate!=0 && secondDate!=0){
          document.getElementById('dateproblem').innerHTML = finalDiff;
         }
         else{
            document.getElementById('dateproblem').innerHTML = "Please Select Both Date";
         }
     }
 
