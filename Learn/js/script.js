/*

    Functions

*/
function regExp(){

    // const pattern2 = /09\d{8}/;
    // document.getElementById("demo4").innerHTML = "<b>Test Phone Number Result: </b>"+pattern2.test("0968897568");
    
    let p = "rinv54554#9!s@gmail.com";
    
    const pattern3 = /.+@.+.com/;
    let r = "Test Pattern: " + pattern3 + "\n Email Result: ";
    resultCol.innerHTML = r + p + " -> " + pattern3.test(p);
}

let newWin;

function openWin(){
    newWin = open("", "New Window", "width=200,height=100");
    newWin.document.write("This is a new window.");
    newWin.open("http://www.google.com/");
    resultCol.innerText = "Opened 2 windows";
}

function checkWin(){
    if(newWin){
        if(newWin.closed){
            resultCol.innerText = "The window is closed.";

        }
        else{
            resultCol.innerText = "The window still openning.";

        }
    }
}

function showConfirm(){
    if(confirm("Are you sure?") == true){
        resultCol.innerText = "You clicked yes!";
    }
    else{
        resultCol.innerText = "You clicked no!";
    }
}

function hide(){
    let p =  "This is a statement.";
    if(document.getElementById("demo1").innerHTML == p){
        document.getElementById("demo1").innerHTML = " ";
    }
    else{
        document.getElementById("demo1").innerHTML = p;
    }
}

if(typeof document.URL !== null){
    document.getElementById("link").innerHTML = document.URL;
}

function focusType(){
    resultCol.focus();
}

function blurType(){
    resultCol.blur();
}

function findActive(){
   let element = document.activeElement.tagName;
   let actField = document.getElementById("act");
   if(element != null){
        actField.innerText = element; 
        actField.style.color = "red";
   }
}

function bgColorChange(){
    document.getElementById("contextMenu").innerHTML += "<br>Clicked";
}

function copyExecuted(){
    document.getElementById("copy").style.backgroundColor = "#6dbab4";
    document.getElementById("copy").innerHTML += "<br><br><b>* It's copied *</b>";
}

function clearText(){
    document.getElementById("copy").innerText = "The oncopy event occurs when the user starts a copy process in the browser.";
}

function inputFocus(){
    document.getElementById("inputTest").style.backgroundColor="#9cddac";
}

function inputBlur(){
    document.getElementById("inputTest").style.backgroundColor="";
}

function fullScreen(){
    let element = document.getElementById("showFull");
    element.requestFullscreen();
}

function cancelFullScreen(){
    document.webkitExitFullscreen();
}

function showRange(value){
    document.getElementById("rangeInput").innerHTML = value;
}

function returnZero(){
    document.getElementById("historyNums").innerHTML = " ";
    document.getElementById("keyupSum").innerHTML = 0;
}



function mouseEnter(img){
    img.style.height="auto";
    img.style.width="auto";
}

function mouseLeave(img){
    img.style.height="32px";
    img.style.width="32px";
}

function mouseDown(element){
    element.style.color = "black";
    element.style.fontWeight = "bold";
}

function mouseUp(element){
    element.style.color = "#b5b5b5";
    element.style.fontWeight = "normal";
}

function pageShow(){
   console.log("This is a JS Note written by Tatiana.");
}

function paste(){
    document.getElementById("pasteShow").innerHTML = "You Pasted some text.";
}

function noPaste(){
    if(document.getElementById("pasteInput").value == ""){
        document.getElementById("pasteShow").innerHTML = "Nothing Pasted yet";
    }
}

function testReset(){
    alert("You Reset the Form");
}

function showPrompt(){
    let promptResult = window.prompt("Enter yout Favorite singer:");
    let msg = "Your beloved singer is " + promptResult;
    document.getElementById("showPopupResult").innerHTML = msg;

}


let scrollCount = 0;
function scrollTimes(){
    scrollCount++;
    document.getElementById("showScroll").innerHTML="<b>"+ scrollCount + "<br>";
}

function selectText(){
    document.getElementById("copy").innerHTML += "<h6 style='color:green;'>You selected this!</h6>";
}

function assertToggle(){
    document.getElementById("showToggle").innerHTML += "Opened Toggle<br>";
}

function mouseWheel(){
    document.getElementById("showWheel").style.color = "orange";        
    
    if(document.getElementById("showWheel").style.fontSize == "30px"){
        document.getElementById("showWheel").innerHTML = "Smaller font size";
        document.getElementById("showWheel").style.fontSize = "20px";        
    }
    else{
        document.getElementById("showWheel").innerHTML = "Larger font size";
        document.getElementById("showWheel").style.fontSize = "30px";
    }
}

function toTop(){
    let pos = document.getElementById("navbarNavDarkDropdown");
    pos.scrollIntoView();
}

function validForm(){
    let n = document.forms["validTestForm"]["validName"].value;
    let c = document.forms["validTestForm"]["validCountry"].value;
    
    if(n == "" || c == ""){
        alert("Nothing Filled in ");
        return false;
    }
    else{
        let msg = "Your Name: " + n + "\nNationality: "+c;
        alert(msg);
    }
}

function showWindowSize(){
    document.getElementById("showWidth").innerHTML = "<b>Window Width: </b>" + window.innerWidth + "px";
    document.getElementById("showHeight").innerHTML = "<b>Window Height: </b>" + window.innerHeight + "px";
} 

function goBack(){
    window.history.back();
}

function goForward(){
    window.history.forward();
}

function showLanguage(){
    document.getElementById("showNavField").innerHTML = 
    "Navigator.language is " + navigator.language;
}

function showCookie(){
    document.getElementById("showNavField").innerHTML = 
    "Navigator Cookie Enabled is " + navigator.cookieEnabled;
}

function getCookie(){
    let rawCookie = decodeURIComponent(document.cookie);
    let cookieContent = rawCookie.split(';');
    let cookieMsg = '';
    for(let i = 0; i < cookieContent.length; i++){
        let c = cookieContent[i];
        cookieMsg += i + 1 + "." + c + "<br>";
    }
    document.getElementById("showCookieContent").innerHTML = cookieMsg;
}

function submitAPIForm(){
    let mail = document.getElementById("mailAPI");
    let name = document.getElementById("nameAPI");
    if(mail.checkValidity()){
        alert("Correct mail format.");
    }
    else{
        alert("Wrong mail format.");
    }

    if(name.validity.tooLong){
        alert("Text length too long.");
    }
    else{
        alert("Text length is valid.");
    }
}

function backTwoPage(){
    window.history.go(-2);
}

function goThreeePage(){
    window.history.go(3);
}

function clearStorage(){
    window.localStorage.clear();
}

function getStorage(){
    let val = document.getElementById("storageValSet").value;
    localStorage.setItem("username", val);
    val = " ";
}

// Web Worker
let worker;
function receivedWorkerMessage(event){

    // event.data is the data 
    let primes = event.data;
    document.getElementById("primeResult").innerText = primes;
    worker.terminate();
    worker = undefined;
}

function primeWebWorker(){

    // Add a web worker object
    worker = new Worker("./js/getPrimeAry.js");

    // function executed if receive message from web worker
    worker.onmessage = receivedWorkerMessage;
    let fromNum = document.getElementById("primeFrom").value;
    let toNum = document.getElementById("primeTo").value;

    // Send values to worker (getPrimeary.js)
    worker.postMessage({
        from : fromNum,
        to : toNum
    });
}

/*

    Not Function

*/ 

let e = document.getElementById("eventArea");
e.addEventListener("mouseover", function(){
    document.getElementById("showEvent").innerHTML = "Mouse Over";                            
});
e.addEventListener("mouseout", function(){
    document.getElementById("showEvent").innerHTML = "  ";                            
});

let menuBtn = document.getElementById("contextMenu");
let removeBtn = document.getElementById("removeEvent");
menuBtn.addEventListener("contextmenu",bgColorChange);

removeBtn.addEventListener("click", function(){
    menuBtn.removeEventListener("contextmenu", bgColorChange);
});

document.getElementById("copy").addEventListener("dblclick", function(){
    document.getElementById("copy").innerHTML += "<h6 style='color:pink;'>You double clicked this!</h6>"
});

document.getElementById("trans1").addEventListener("transitionend", function(){
    this.innerHTML = "<h6>Transition Occured </h6>";
});

/*

    Dropdown Submenu
    https://bootstrap-menu.com/detail-multilevel.html 
    
*/

document.addEventListener("DOMContentLoaded", function(){

    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

    //querySelectorAll() method returns all elements that matches a CSS selector(s).
    // close all inner dropdowns when parent is closed
    document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){

    everydropdown.addEventListener('hidden.bs.dropdown', function () {

        // after dropdown is hidden, then find all submenus
        this.querySelectorAll('.submenu').forEach(function(everysubmenu){

            // hide every submenu as well
            everysubmenu.style.display = 'none';

        });
    })
});
    
document.querySelectorAll('.dropdown-menu a').forEach(function(element){
    element.addEventListener('click', function (e) {

        let nextEl = this.nextElementSibling;

        if(nextEl && nextEl.classList.contains('submenu-right')) {	
            
            // prevent opening link if link needs to open dropdown
            e.preventDefault();

            if(nextEl.style.display == 'block'){

                nextEl.style.display = 'none';

            } else {

                nextEl.style.display = 'block';

            }

        }

    });

})
}
// end if innerWidth
}); 
// DOMContentLoaded  end



