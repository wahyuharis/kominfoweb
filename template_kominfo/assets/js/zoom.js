$(document).ready(function(){
    var width=$( window ).width();
    console.log(width);

    if( width >= 1900  &&  width < 2500 ){
        document.body.style.zoom = "150%";
    }

    if( width >= 2500  ){
        document.body.style.zoom = "170%";
        
    }

});