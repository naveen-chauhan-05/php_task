console.log("weather2 js");

async function weather1(){
    console.log("inside function");

    const response = await fetch("http://api.weatherapi.com/v1/forecast.json?key=c9a5a19f3a7343ef979100407222612&q=India&days=10&aqi=no&alerts=no");
    
    const user = await response.json();
    // console.log(user);
    if(response){
        hideLoader();
    }
    show(user);
    
}
 
 weather1();
 function hideLoader(){
     console.log("file is loading");
 }
 function show(data){
    //  console.log("show data function");
$showBool  = true;
     console.log(data);
     console.log("after check");
     const location = data.location;
     let firstHeading = "";
     for (const key in location) {
      firstHeading += `${key} : ${location[key]} &nbsp&nbsp`;
     }

     document.getElementById('location').innerHTML = firstHeading;
     let forecastDay = data.forecast.forecastday;
    //  console.log(forecastDay);
        let firstDay = document.getElementById('firstDay');
        let firstEvent = firstDay.addEventListener('click', function(){
            myFunction(forecastDay[0]);
        });
       let secondDay =  document.getElementById('secondDay');
       let secondEvent = secondDay.addEventListener('click', function(){
        myFunction(forecastDay[1]);
    });
       let thirdDay =  document.getElementById('thirdDay');
       let thirdEvent = thirdDay.addEventListener('click', function(){
        myFunction(forecastDay[2]);
    });
      if(firstEvent){
           
        function myFunction(forecast){
             showData(forecast);
        }   
      }
      else if(secondDay){
         
        function myFunction(forecast){
            showData(forecast);
        }
      }
      else if(thirdEvent){
        
        function myFunction(forecast){
            showData(forecast);
        }
      }
      function showData(forecast){

           $showBool = false;
          console.log("inside function");
          console.log(forecast);    
          let foreCast = "";
        foreCast+= ` <br> <h3> Full Day Details </h3><br>`;
          for (const key in forecast) {
              if (Object.hasOwnProperty.call(forecast, key)) {
                
                   if(key == "day"){
                    let dayValue = forecast.day;
                    console.log(dayValue);
                    foreCast += ` <h3> ${key} Details : </h3> `;
                    for (const key1 in dayValue) {
                        if (Object.hasOwnProperty.call(dayValue, key1)) {
                             if(dayValue=="condition"){
                                 continue;
                             }
                              else{
                             foreCast += `<li> ${key1} : ${dayValue[key1]}`;
                              }
                        }
                    }
                     
                } 
                  else if(key=="astro"){
                      let astroValue = forecast.astro;
                       foreCast += ` <h3> ${key}: </h3>`;
                      for (const key1 in astroValue) {
                          if (Object.hasOwnProperty.call(astroValue, key1)) {
                              foreCast += `<li type ="square"> ${key1} : ${astroValue[key1]} </li>`;
                              
                          }
                          
                      }
                  }
                  else if(key=="hour"){
                      let hourValue = forecast.hour;
                      foreCast += ` <h2>${key}: Details </h2> `;
                      for (let index = 0; index < hourValue.length; index++) {
                           foreCast += ` <h4> Hour Time ${index}: </h4> `;
                           let getHour = hourValue[index];
                           for (const key1 in getHour) {
                               if (Object.hasOwnProperty.call(getHour, key1)) {
                                   if(key1=="condition"){
                                       continue;
                                   }
                                   else{
                                    foreCast += `<li> ${key1} : ${getHour[key1]} </li>`;
                                   }
                               }
                           }
                          
                      }
                  }
                  else{
                  foreCast += `<li> ${key} : ${forecast[key]} </li>`;  
                  }
              }

              document.getElementById('forecast').innerHTML = foreCast;
          }
          
      }
      if($showBool==true){

let currentDetail = data.current;
let currentTemp = "";
 currentTemp += `<h3> Current Details </h3>`;
for (const key in currentDetail) {
    if (Object.hasOwnProperty.call(currentDetail, key)) {
        if(key =="condition"){
            continue;
        }   
        currentTemp += `<li> ${key} : ${currentDetail[key]} &nbsp &nbsp </li>`;
         
    }
    document.getElementById('forecast').innerHTML = currentTemp;
}
     
      }
 }
 
 