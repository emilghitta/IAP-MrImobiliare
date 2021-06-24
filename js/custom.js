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
    

//Verificam daca avem edit mai mare de 0 ca valoare in parametru. Daca avem, apelam metoda displayEdit() care va face display la form-ul de editare
    var edit = urlParams.get('editez');
    var editProprietate = urlParams.get('editezProprietate');

if(editProprietate > 0){
    displayEditProprietate();
}

if(edit > 0){
   displayEdit();
   }


if(test == "failed"){
    //Daca gasim valoarea failed in parametrul test atunci o sa atribuim clasa b-block div-ului de eroare, setam text-ul de eroare si ii facem highlight in rosu
    
    errorDiv.className ="b-block";
    
    errorText.textContent = 'Credentiale Invalide';
    document.getElementsByClassName("b-block")[0].style.backgroundColor = "red";
}else{
    //In cazul in care parametru nu este egal cu valoarea de mai sus evaluata o sa ascundem content-ul div-ului 
    
    document.getElementsByClassName("b-none")[0].style.display = "none";
}


//Folosim urmatoarele metode pentru afisarea/ascunderea form-urilor de adaugare/editare cand are loc comutarea intre ele.


function displayEditProprietate(){
    varEditProprietate = document.getElementById("editareProprietateActivata");
    varEditProprietate.style.display = "";
}

function displayEdit(){
    
    varEditForm = document.getElementById("editareActivata");
    varEditForm.style.display = "";
    
}

function hideEdit(){
    varEditForm = document.getElementById("editareActivata");
    varEditForm.style.display = "none";
}

function displayAdaugare(){
    varAdaugForm = document.getElementById("adaugareActiva");
    varAdaugForm.style.display = "";
    
}

function hideAdaugare(){
    varAdaugForm = document.getElementById("adaugareActiva");
    varAdaugForm.style.display = "none";
}





