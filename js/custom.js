jQuery(document).ready(function() {
	
	"use strict";
	// Your custom js code goes here.
    
});

//Metoda custom care ne ajuta sa identificam elementele din pagina via xpath

function getElementByXpath(path) {
  return document.evaluate(path, document, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null).singleNodeValue;
}

    

document.getElementsByClassName("d-none")[0].style.display = "none";

// Apelam metoda getElementByXpath si ca parametru pasam valoarea xpath  a elementelor pe care dorim sa le manipulam.

    var errorDiv = getElementByXpath("/html/body/div[4]/div/div/div");
    var errorText = getElementByXpath("/html/body/div[4]/div/div/div/h4");

//Folosim o metoda ce ne returneaza valoarea din search bar-ul browser-ului si stocam valoarea parametrului ?test intr-o variabila pe care o folosim la conditionare
    
    var queryString = window.location.search;
    var urlParams = new URLSearchParams(queryString);
    var test = urlParams.get('test');

if(test == "failed"){
    //Daca gasim valoarea failed in parametrul test atunci o sa atribuim clasa b-block div-ului de eroare, setam text-ul de eroare si ii facem highlight in rosu
    
    errorDiv.className ="b-block";
    
    errorText.textContent = 'Credentiale Invalide';
    document.getElementsByClassName("b-block")[0].style.backgroundColor = "red";
}else{
    //In cazul in care parametru nu este egal cu valoarea de mai sus evaluata o sa ascundem content-ul div-ului 
    
    document.getElementsByClassName("b-none")[0].style.display = "none";
}





