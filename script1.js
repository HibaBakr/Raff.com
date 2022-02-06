

var imgIndex = 0;

showImg();



function showImg() {

    var i;

    var slides = document.getElementsByClassName("news");

    for (i = 0; i < slides.length; i++) {

        slides[i].style.display = "none";

    }

    imgIndex++;

    if (imgIndex > slides.length) {

        imgIndex = 1

    }

    slides[imgIndex - 1].style.display = "block";

    setTimeout(showImg, 4000);

}

