window.load = slide(1);

var bgNumber = 1;

function slide(n) {
    var allBgs = 4;
    
    document.getElementById('slider-background-image').style.backgroundImage = "url('./img/header/slider/slide-"+ n +".png')";

}

function prev(){

    if(bgNumber > 1){
        bgNumber--;
        slide(bgNumber);
    }
    else{
        bgNumber=4;
        slide(bgNumber);
    }

}

function next(){

    if(bgNumber < 4){
        bgNumber++;
        slide(bgNumber);
    }
    else{
        bgNumber=1;
        slide(bgNumber);
    }

}