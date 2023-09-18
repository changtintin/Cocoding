<div  onclick="findActive()" >
<!-- JS DOM Event -->
    <div class="row p-3">

        <div id="msg"></div>

        <h4 id="scrollspyClick">

            What Can JavaScript Do?
            
        </h4>

        <p id="demo1"></p>

        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-3 col-xxl-3">

            <button type="button" class = "btn btn-md btn-secondary" onclick="hide()">

                Click to hide / show 

            </button>

        </div>

    </div>    

    <hr>     

    <div class ="row ps-3 py-5">

        <div class="col-1" id="titleDecor"></div>

        <div class="col-11">

            <h1 id="scrollspyDOM">JS DOM Event</h1>

        </div>

    </div>


    <div class="row p-3 ">       

        <!-- Show URL -->
        <h4 id="scrollspyURL">Show URL</h4>

        <pre>document.URL</pre>

        <div id="link"></div>

    </div>

    <hr>

    <!-- Status Field -->
    <h4 class = "p-3" id="scrollspyWindow">Window / RegExp</h4>

    <div class="p-3">

        <div class = "status_bar" id = "resultCol">

            <h5>

                Show Result

            </h5>

        </div>

        <p id="showRegExp"></p>

        <div class="btn-group py-3" role="group" aria-label="example">

            <button type = "button" class = "btn btn-sm btn-warning " onclick="openWin()"> 

                Open Window

            </button>

            <button type = "button" class = "btn btn-sm btn-success" onclick="checkWin()">

                Check Window

            </button>

            <button type="button" class="btn btn-sm btn-success" onclick="alert('You Clicked Me')" id="test"> 

                Try alert()    

            </button>

            <button type="button" class="btn btn-sm btn-secondary" onclick="window.print()">

                Print This Page                      

            </button>

            <button type="button" class="btn btn-sm btn-secondary" onclick="regExp()">   

                Regular Expression

            </button>    
        </div>                    

    </div>

    <hr>

    <!-- Document Write -->                    
    <div class="row p-3">

        <h4 id="scrollspyDocWrite">Document Write</h4>

        <div class="col-sm-3">

            <button type="button" class="btn btn-sm btn-danger" onclick="document.write('<h1>Hello<h1>')">

                Try document.write()

            </button>

        </div>
        
        <script>  

            const pattern1 = /(Dad|Mom)\s\w\sLove\s.+/;    
            
            let input =  "Mom I Love you so much";                          
            
            document.getElementById("showRegExp").innerHTML = pattern1 + "<br><b>MATCH--></b> " + input + "<br>Match result: " + pattern1.test(input);                              

        </script>

    </div>

    <hr>

    <!-- Active Element -->
    <h4 class="p-3" id="scrollspyActive">Active Element</h4>

    <div class="row p-3">
        
        <pre>document.activeElement</pre>

        <div class="col-xl-6 col-xxl-6 col-sm-10 col-m-8 col-lg-7  border border-dark-subtle rounded-4 border-2 p-3 m-2">
        
            <h5>

                Show Active Element:

                <small id="act"></small>

            </h5>

            <p class="tab">

                The activeElement property returns the HTML element that have focus.                                
            
            </p>

        </div>

    </div>

    <hr>

    <!-- Event Handler -->
    <h4 class="p-3" id="scrollspyEventHandler">Test Event Handler</h4>

    <div class = "p-3" id="eventArea">

        <pre>e.addEventListener("mouseover", function(){</pre>
        <pre>  document.getElementById("showEvent").innerHTML = "Mouse Over"; </pre>                                                       
        <pre>}); </pre>
        
        
        <p id="showEvent"> </p>

    </div>    

    <hr>

    <!-- Contextmenu -->


    <div class = "row p-3" id="contextMenuField">
        
        <h4 id="scrollspyContextMenu">Contextmenu</h4>

        <div class="col-sm-6" id="contextMenu">

            <h5>Try contextmenu</h5>

            <p>Click right button</p>

            <button class="btn btn-sm btn-outline-secondary" id="removeEvent">Remove Event Handler</button>

        </div>

        <div class="col-sm-6" >

            <h5>Enter Something</h5>

            <pre> focus() / blur()</pre>

            <input type="text" onfocusin="inputFocus()" onblur="inputBlur()" id="inputTest">          
                                            
        </div>

    </div>

    <hr>

    <!-- Double Click / Copy -->
    <h4 class="p-3" id="scrollspyCopy"> Double Click / Copy / Paste / Select</h4>

    <div class="row p-3" >

        <div class="col-sm-6">
            
            <p class="d-inline" id="copy" oncopy="copyExecuted()">

                The oncopy event occurs when the user starts a copy process in the browser.

            </p> 

            <button class="btn btn-sm btn-outline-success d-inline mr-1" type="button" onclick="clearText()">

                Clear

            </button>  

        </div>

        

    </div>

    <div class="row p-3">

        <div class="col-sm-6">

            <textarea class="border border-1 border-primary" onselect="selectText()" > Select Something here and see what happens </textarea>

        </div>

    </div>

    <div class="row p-3">

        <div class="col-sm-auto">

            <h5>Paste</h5>

            <input type="text" placeholder="Paste Text Here" onpaste="paste()"  onkeypress="noPaste()" id="pasteInput">                                          


            <p id="pasteShow"></p>

        </div>

    </div>

    <hr>

    <!-- Full Screen -->
    <h4 class="p-3" id="scrollspyScreen">Screen</h4>

    <div class = "p-3" id = "showFull">

        <h5>Full Screen</h5>

        <pre>requestFullscreen</pre>
        
        <button class="btn btn-sm  btn-secondary" onclick="fullScreen()">

            Open Fullscreen

        </button>     
        
        <button class="btn btn-sm  btn-secondary" onclick="cancelFullScreen()">

            Exit Fullscreen

        </button>     
                                        
    </div>

    <hr>

    <!-- Oninput -->
    <h4 class="p-3" id="scrollspyRangeInput">Oninput</h4>

    <div class = "p-3" id = "showFull">

        <h5>Range Input</h5>

        <pre>For input and textarea </pre>

        <p class ="d-inline pe-3">0</p>

        <input class ="d-inline" type="range" oninput="showRange(this.value)">

        <p class ="d-inline ps-3">100</p>

        <p>
            <b id="rangeInput">0</b>
            %
        </p>

    </div>

    <hr>

    <!-- Keyup -->
    <h4 class="p-3" id="scrollspyKeyUp">Keyup</h4>

    <div class="p-3">

        <p class="d-inline">Enter a number: </p>
        
        <input type="number" id="keyupInput">

        <button class="btn btn-sm btn-outline-secondary" onclick="returnZero()">Zero</button>
        
        <p class="d-inline" id="historyNums"></p>

        <br>
            
        <b class="d-inline" >Sum: </b>

        <p class="d-inline" id="keyupSum">0</p>

    </div>

    <script>  

        let keyUp = document.getElementById("keyupInput");
        
        keyUp.addEventListener("keyup", function(){
            
            let inputNum = parseInt(keyUp.value);
            
            document.getElementById("historyNums").innerHTML += inputNum + ", ";
            
            let sum = parseInt(document.getElementById("keyupSum").innerText);                                                                                                   
            
            document.getElementById("keyupSum").innerText =  inputNum + sum;
            
            keyUp.value = 0;

        }); 

    </script>

    <hr>

    <!-- Onload / Mouse Event -->
    <div class ="row p-3">

        <div class="col-6">

            <h4 id="scrollspyOnLoad">Onload / Mouse Event</h4>   

            <script>

                function load(){
                    console.log("The pic 'high_reso.jpg' has loaded");
                }

            </script>
            
            <img src="./img/high_reso.jpg" alt="Break pic" onload="load()"  class="loadPic">                                            
                    
        </div>

        <div class="col-6">

            <h5>Move mouse on and off the icon</h5>

            <pre>mouseenter() / mouseleave()</pre>
            
            <img src="./img/good.png" alt="good.png" class="mb-5" onmouseenter="mouseEnter(this)"  onmouseleave="mouseLeave(this)" class="mouseOverPic" >

        </div>

    </div>

    <div class="row">

        <h5 class="mt-4">Click the Text</h5>

        <p onmousedown="mouseDown(this)" onmouseup="mouseUp(this)">

            The mouseDown() function sets the color of this text to black. 

            The mouseUp() function sets the color of this text to light grey.

        </p>

    </div>

    <hr>

    <!-- Reset Form -->
    <form onreset="testReset()">
    
        <div class ="row p-3">

            <h4 id="scrollspySetForm">Reset Form</h4>   
    
            <div class="col-xxl-4 col-xl-4 col-lg-5 col-sm-5 col-md-5">
                
                <label for="name" class="form-label">Name</label>
                
                <input type="text" class="form-control form-control-sm mb-3" id="name">
                
            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-5 col-sm-5 col-md-5">
                
                <label for="adr" class="form-label">Address</label>
                
                <input type="text" class="form-control form-control-sm mb-3" id="adr">
                
            </div>
                            
            <div class="col-xxl-4 col-xl-4 col-lg-2 col-sm-2 col-md-2">                                

                <input type="reset" class="btn btn-sm btn-success">

            </div>                   

        </div>

    </form>

    <hr>

    <div class ="row p-3">

        <h4 id="scrollspyScroll">Scroll</h4>

        <div class="col-4">

            <div class="overflow-scroll border border-warning my-3 scrollTimes" onscroll="scrollTimes()" class>
                
                Toggle between class names on different scroll positions - When the user scrolls down 50 pixels from the top of the page, the class name "test" will be added to an element (and removed when scrolled up again).

            </div>

        </div>

        <div>
            Scroll Times:
            <span id="showScroll">0</span>
        </div>

    </div>   

    <hr>

    <!-- Toggle -->
    <div class ="row p-3">

        <h4 id="scrollspyToggle">Toggle</h4>
        
        <p id="showToggle"></p>

        <details ontoggle="assertToggle()">
            
            <summary>How to convert string to camel case in JavaScript ?</summary>

            <p>

                Use str.replace() method to replace the first character of the string in lower case
                
                <br>
                
                and other characters after space will be in upper case. 
                
                <br>
                
                The toUpperCase() and toLowerCase() methods are used to 
                
                <br>

                convert the string character into upper case and lower case respectively.
            
            </p>

        </details>

    </div>

    <hr>

    <!--  -->
    <div class ="row p-3">

        <h4 id="scrollspyTransition">Transition</h4>

        <pre class="mt-3">transitionend()</pre>

        <div class="col-3">

            <div class="trans" id="trans1">
                
                ease-in-out
            
            </div>

        </div>

        <div class="col-3">

            <div class="trans" id="trans2">

                ease-in

            </div>

        </div>

        <div class="col-3">

            <div class="trans" id="trans3">
                
                ease-out

            </div>

        </div>

        <div class="col-3">

            <div class="trans" id="trans4">
                
                linear
            
            </div>

        </div>

    </div>

    <hr>

    <!-- Wheel -->
    <div class ="row p-3">

        <h4 id="scrollspyWheel">Wheel</h4>

        <h6 id="showWheel">No wheeling occurs</h6>
        
        <div onmousewheel="mouseWheel()">
            
            Roll the mouse wheel over me!

        </div>

    </div>

    <hr>

    <!-- Form Validation -->
    <div class ="row p-3">

        <h4 id="scrollspyFormValid">Form Validation</h4>

        <form method="post" onsubmit="validForm()" name="validTestForm">

            <div class="col-4">
                        
                <label for="validName" class="form-label">Name</label>
                
                <input type="text" class="form-control form-control-sm mb-3" id="validName" name="validName">
                
            </div>

            <div class="col-4">
                        
                <label for="validCountry" class="form-label">Nationality</label>
                
                <input type="text" class="form-control form-control-sm mb-3" id="validCountry" name="validCountry">
                
            </div>

            <div class="col-8">
                
                <input type="submit" class="btn btn-sm btn-secondary">
                
                <br>

                Similar to

                <code>
                    
                    &ltinput type="text" name="fname" required>
                    
                </code>

            </div>

        </form>

    </div>

    <hr>

    <!-- Animation -->
    <div class ="row p-3">

        <h4 id="scrollspyAnimate">Animation</h4>

        <div class="col-8">

            <code>

                #animationField{

                <br>

                <div class="tab">width: 50px;</div>
                

                <br>

                <div class="tab">height: 50px;</div>
                
                <br>

                <div class="tab">margin: 20px;</div>
                
                <br>
                
                <div class="tab">border: none;</div>
                
                <br>
                
                <div class="tab">border-radius: 100px;</div>
                
                <br>
                
                <div class="tab">position: relative;</div>
                
                <br>
                
                <div class="tab">background-color: rgb(249, 204, 136);</div>
                
                <br>

                <div class="tab">animation: 10s firstAnimation ease-in-out infinite alternate; </div>
                
                <br>

                }

            </code>

            <div id="animationField"></div>

        </div>

    </div>

    <hr>
</div>
