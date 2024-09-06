
var myImages = new Array("download.jpg", "download (1).jpg", "06715ba633ee1b0a343ffb26a7d85972.gif", "source.gif", "tenor.gif");
var folderImages = "img/random santas/";
var spawnedImages = [];

url_string = "C:/Users/mcalus/OneDrive%20-%20GXO/Desktop/Programmer/Projects/prezenty/img/random santas";
url = new URL(url_string);
options = url.searchParams.getAll("options[]");
console.log(options);

function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
    }
    };
    xhttp.open("GET", url_string, true);
    xhttp.send();
}

function myFunction(xml) {
    // console.log(xml.responseText)
    var parser = new DOMParser();
    var htmlDoc = parser.parseFromString(xml.responseText, 'text/html');
    var preList = htmlDoc.getElementsByTagName("pre")[0].getElementsByTagName("a")
    for (i = 1; i < preList.length; i++) {
    console.log(preList[i].innerHTML)
    }
}

loadDoc();


function spawnImg()
{
    var randomNum = Math.floor(Math.random() * myImages.length);
    var yourImage = document.createElement("img");
    var randomWidth = Math.floor(Math.random() * 500 + 50);
    
    yourImage.src = folderImages + myImages[randomNum] ;
    yourImage.style.cssText = " position:absolute; top:-" + yourImage.height + "px; left:" + Math.floor(Math.random() * (document.documentElement.clientWidth - randomWidth)) + "px; width:" + randomWidth + "px;";
    spawnedImages.push([yourImage,0,0]); // this line is where we add the image. 
    //In the same sub-array, put a number, 0, to store the image's age, and a velocity, 0, to make the physics look good. These will be used later.
    document.body.appendChild(yourImage);
    yourImage.style.top = (yourImage.height === 0 ? 1000 : yourImage.height) * -1 + "px";
}

animateImg = function(){
    for(image of spawnedImages){ // loop over all elements of our array
        image[1] += 1; //increase the age
        if(image[1] > 100){ //if old enough, fall
            let fallSpeed = Math.floor(Math.random() * 10) / 500;
            image[2] += fallSpeed; //accelerate, tweak this value to change how strong gravity is, def 0.1
            currentTop = parseFloat(image[0].style.top.replace("px","")); // get the current y position
            currentTop += image[2]; //move
            newTop = String(currentTop) + "px"; //change back to string
            image[0].style.top = newTop; //set the attribute

            if(newTop > document.documentElement.clientHeight){ //if off-screen, remove it
                document.body.removeChild(image[0]);
                spawnedImages.splice(spawnedImages.indexOf(image),1); //remove from array
            }
        }
    }
}

var animateImgLoop; 
// setInterval(animateImg,5); // choose whatever interval you want. Here, it is called every 5 milliseconds