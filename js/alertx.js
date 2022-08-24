function alertx(x){
    $("#alert h3").html(x);
    $("#alert").animate({"height": "50px"}, 800);
    setTimeout(function(){
        $("#alert").animate({"height": "0px"}, 800);
    }, 1500);
}