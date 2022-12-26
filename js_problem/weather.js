console.log("This is Weather api fetch");
const varName = [];

function fetchWeather(){
console.log("This is weather function");
let url = "http://api.weatherapi.com/v1/forecast.json?key=c9a5a19f3a7343ef979100407222612&q=India&days=10&aqi=no&alerts=no";
fetch(url).then((Response)=>{
 
    return Response.json();
}).then((data)=>{
console.log(data.forecast.forecastday)
 
 
 
let location = data.location;
text = "";



// location.forEach(element => {
//     text += `<li>${element} </li>`;
// });
// document.getElementById('new').innerHTML = text;

}); 
}
 fetchWeather();

 