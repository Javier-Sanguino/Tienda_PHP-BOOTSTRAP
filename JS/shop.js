const windowIframe = document.getElementById("iframeContenedor");

function windowFunction() {
    windowIframe.classList.add("active");   
}

function windowClose() {
    windowIframe.classList.remove("active")  
}