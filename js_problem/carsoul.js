let slideNumber = 1;
showSlides(slideNumber);

function plusSlides(n) {
    showSlides(slideNumber += n);
  }

  function currentSlide(n) {
       
    showSlides(slideNumber = n);

  }
 
  function showSlides(n) {
    let i;

    let slides = document.getElementsByClassName("item");
    let dots = document.getElementsByClassName("dot");
    if (n == slides.length) 
    {
           let noneDisplay = document.getElementById("nextButton");
           noneDisplay.style.display = "none";
    }
    else{
        let noneDisplay = document.getElementById("nextButton");
           noneDisplay.style.display ="block";
    }
    if (n ==1) {
        let noneDisplay = document.getElementById("prevButton");
           noneDisplay.style.display = "none";
    }
     else{
        let noneDisplay = document.getElementById("prevButton");
        noneDisplay.style.display = "block";
     }

    for (i = 0; i <slides.length; i++) {
        // console.log(slides[i]);
      slides[i].style.display = "none";
       
    }
    for (i = 0; i < dots.length; i++) {
   
      dots[i].className = dots[i].className.replace(" active", "");
       
   
    }
    
    console.log(slideNumber);
    
    slides[slideNumber-1].style.display = "block";
    
    dots[slideNumber-1].className += " active";
    // dots[slideNumber-1].style.fontWeight  = "1000";
    // dots[slideNumber-1].style.color  = "red";
    // dots[slideNumber-1].style.textDecoration  = "underline";
    
    
  }