<div class ="row ps-3 py-5">

    <div class="col-1" id="titleDecor"></div>

    <div class="col-11">

        <h1 id="scrollspyBOM">JS BOM</h1>
        
    </div>

</div>

<div class ="row p-3">    

    <h4 id="scrollspyDef">Definition</h4>
    
    <div class ="col">
   
        <ol>

            <li>BOM =  Browser Object Model</li>

            <li>Allows JavaScript to communicate with browser</li>

        </ol>

        <div class="overflow-auto">

            <img src="./img/JS_DOM_BOM.png" class="JSDefiPic " alt="...">

        </div>
        
    </div>

</div>



<!-- Window -->
<div class="row p-3">

    <h4 id="scrollspyDOMWindow">Window</h4>

    <div class="col-5 py-3">

        <button class="btn btn-sm btn-secondary" onclick="showWindowSize()">
            
            Window Size
        
        </button>

    </div>

    <p id="showWidth"></p>

    <p id="showHeight"></p>

</div> 

<!-- Screen -->
<div class="row p-3">

    <h4 id="scrollspyDOMScreen">Screen</h4>
    
    <div class="py-2" id="showDOMScreen"></div>

    <div class="py-2" id="showDOMAvaScreen"></div>

    <script>

        document.getElementById("showDOMScreen").innerHTML =

        "<b>Browser inner window width: </b>" + window.innerWidth + " px<br>" +

        "<b>Browser inner window height: </b>" + window.innerHeight + " px";
        
        document.getElementById("showDOMAvaScreen").innerHTML = 

        "<b>Available Screen Width: </b>" + screen.availWidth + " px<br>" +
        
        "<b>Available Screen Height: </b>" + screen.availHeight + " px";

    </script>

</div>

<hr>

<!-- Location -->
<div class="row p-3">

    <h4 id="scrollspyDOMLocation">Location</h4>

    <div class="py-2" id="showDOMLocation"></div>

    <script>

        document.getElementById("showDOMLocation").innerHTML =

        "<b>Page hostname: </b>" + window.location.hostname +

        "<br> <b>Page path: </b>" + window.location.pathname +

        "<br><b>Page protocol: </b>" + window.location.protocol + 

        "<br><b>Port number: </b>" + window.location.port;

    </script>

</div>

<hr>

<!-- History -->
<div class="row p-3">

    <h4 id="scrollspyDOMHistory">History</h4>

    <p>
        
        <code>window.history </code>
        
        object can be written without the window prefix. <br>

        Like the Back and Forward button in browser
    
    </p>

    <div class="col-4">

        <button class="btn btn-sm btn-warning d-inline" onclick="goBack()">
            
            <i class="fa-solid fa-angles-left"></i>

            Back

        </button>

        <button class="btn btn-sm btn-success d-inline" onclick="goForward()">

            <i class="fa-solid fa-angles-right"></i>
            
            Forward

        </button>

        <button class="btn btn-sm btn-secondary" onclick="backTwoPage()">Back 2 Pages</button>

        <button class="btn btn-sm btn-secondary" onclick="goThreeePage()">Go 3 Pages</button>

    </div>

</div>

<hr>

<!-- Navigator -->
<div class="row p-3">

    <h4 id="scrollspyDOMNav">Navigator</h4>

    <p>Contains information about the visitor's browser.</p>

    <div class="col-6">

        <button class="btn btn-secondary btn-sm d-inline" onclick="showLanguage()">Browser Language</button>

        <button class="btn btn-secondary btn-sm d-inline" onclick="showCookie()">Cookie Enabled</button>

        <p class="py-3" id="showNavField"></p>

    </div>

</div>

<hr>

<!-- Popup Boxes -->
<div class="row p-3">

    <h4 id="scrollspyPopup">Popup Boxes</h4>
                            
    <div class="col-6">
        
        <button class="btn btn-sm btn-secondary" onclick="showPrompt()">Try Prompt Box</button>

        <p class="py-3" id="showPopupResult"></p>
        
    </div>

</div>

<hr>

<!-- Timing -->
<div class="row p-3">

    <h4 id="scrollspyTiming">Timing</h4>

    <div class="col">

        <p class="py-2">

            <code>setTimeout()</code>

        </p>

        <b id="showTimeout">Wait for the function execute......</b>

        <script>

            window.setTimeout(function(){
                let timestamp = Date.now();
                const dateObj = new Date(timestamp);                                       
                document.getElementById("showTimeout").innerHTML = "It is " +  dateObj.toString()   + " right now.";
            },5000);

        </script>

        <p class="py-2">

            <p>

                <code>setInterval()</code>

            </p>

            <b>

                <span id="year"></span>/<span id="month"></span>/<span id="date"></span>
                
                <span id="day"></span>
                
                <span id="hour"></span>:<span id="minute"></span>:<span id="second"></span>

            </b>
        </p>

        <p class="py-2">

            <a href="https://developer.mozilla.org/zh-TW/docs/Web/JavaScript/Reference/Global_Objects/Date/getDay" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                
                Resource of Date.prototype.getDay()

            </a>
            
        </p>    

        <script>

            function fetchTime(){
                let timestamp = Date.now();
                const dateObj = new Date(timestamp);  
                const dateDay = new Map([
                    [0, "Sun."],
                    [1, "Mon."],
                    [2, "Tues."],
                    [3, "Wed."],
                    [4, "Thurs"],
                    [5, "Fri."],
                    [6, "Sat."]
                ]);
                document.getElementById("year").innerText = dateObj.getFullYear();
                document.getElementById("month").innerText = dateObj.getMonth();
                document.getElementById("date").innerText = dateObj.getDate();
                let numDay = dateObj.getDay();
                document.getElementById("day").innerText = dateDay.get(numDay);
                document.getElementById("hour").innerText = dateObj.getHours();
                document.getElementById("minute").innerText = dateObj.getMinutes();
                let sec =  dateObj.getSeconds();
                if(sec < 10){
                    sec = "0" + sec;
                }
                document.getElementById("second").innerText = sec;
            }

            window.setInterval(fetchTime,500);

        </script>

    </div>

</div>

<hr>

<!-- Cookie -->
<div class="row p-3">

    <h4 id="scrollspyCookie">Cookie</h4>

    <div class="col-6">
        
        <p class="py-2">

            <code>document.cookie</code>

        </p>                                    

        <div id="showCookie"></div>

        <script>

            let c = document.cookie;

            document.getElementById("showCookie").innerHTML = c;

        </script>

    </div>

    <div class="col-6 mt-5">

        <h6>URI (Uniform Resource Identifier)</h6>

        <p class="tab"> Identify the resource by giving its location on the Web</p>
        
        <h6>URL (Uniform Resource Locator)</h6>

        <p class="tab">
            
            Specifies where a resource 
            
            (such as a web page, image, or video) can be found on the Internet.
        
        </p>  

        <button class="btn btn-sm btn-secondary" onclick="getCookie()">Show Parsed Cookie</button>

        <p class="py-2" id="showCookieContent"></p>

    </div>

</div>

