var easter_egg = new Konami(function() { 
    if(animateImgLoop == undefined) {
        animateImgLoop = setInterval(animateImg,5);
    }
    
    spawnImg();
});