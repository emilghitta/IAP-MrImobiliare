jQuery(document).ready(function() {
	
	"use strict";
	// Your custom js code goes here.
    
});

function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}

var errorDiv = getElementByXpath("/html/body/div[4]/div/div/div");
var errorText = getElementByXpath("/html/body/div[4]/div/div/div/h4");
    

document.getElementsByClassName("d-none")[0].style.display = "none";
documbent.getElementsByClassName("b-none")[0].style.display = "none";

window.addEventListener('load', function(){
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var test = urlParams.get('test');

if(test == "failed"){
    errorDiv.className ="d-block";
    
    errorText.textContent = 'Credentiale Invalide';
    document.getElementsByClassName("b-block")[0].style.backgroundColor = "red";
}else{
    
}
})


