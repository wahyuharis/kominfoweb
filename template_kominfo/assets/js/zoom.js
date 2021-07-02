$(document).ready(function(){
    var width=$( window ).width();
    console.log(width);

    if( width >= 1920  &&  width < 2560 ){
        document.body.style.zoom = "150%";
    }

    if( width >= 2560  ){
        document.body.style.zoom = "170%";
        
    }

});