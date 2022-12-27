// console.log("This is Weather api fetch");

// function fetchWeather(){
    
    // console.log("This is weather function");





    var varName = [];
let url = "http://api.weatherapi.com/v1/forecast.json?key=c9a5a19f3a7343ef979100407222612&q=India&days=10&aqi=no&alerts=no";
 fetch(url).then((Response)=>{
 
    return Response.json();
}).then ((data)=>{
 varName.push(data.forecast.forecastday);

});


console.log(varName);

for (let key in varName) {
    
        console.log(varName[key]);
     
}
