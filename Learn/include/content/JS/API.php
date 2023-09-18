<!-- JS Web APIs -->
<div class ="row p-3">

    <h1 id="scrollspyAPI" class="pb-3">JS Web APIs</h1>

</div>


            
<!-- Web Form API -->
<div class="row p-3 overflow-scroll">

    <h4 id="scrollspyAPIForm">Web Form API</h4>

    <code class="py-2">checkValidity()</code>

    <div class="col-sm-3">

        <label class="form-label" for="nameAPI">Your Name</label>

        <input type="text" class="form-control" id="nameAPI" maxlength="10">

    </div>

    <div class="col-sm-3">

        <label class="form-label" for="mailAPI">Your Email</label>

        <input type="email" class="form-control" id="mailAPI">

    </div>

</div>

<div class="row p-3">

    <div class="col">
    
        <button class="btn btn-sm btn-success " type="submit" onclick="submitAPIForm()" id="submitBtn" require>Submit</button>
    
    </div>

</div>
<!-- ./ Web Form API -->

<hr>

<!-- Web Storage API -->
<div class="row p-3">

    <h4 id="scrollspyAPIStorage">Web Storage API</h4>

    <div class="col">

        <p>

            <code>localStorage.setItem() / getItem() / clear()</code>

        </p>

        <b class="my-2">Show Local Storage</b>

        <p id="showUsername"></p>

        <input type="text" id="storageValSet" class="form-control" placeholder="Set Local Storage Here">

        <button class="btn btn-sm btn-outline-success my-3" onclick="getStorage()">Set Local Storage</button>

        <button class="btn btn-sm btn-outline-primary my-3" onclick="clearStorage()">Clear Local Storage</button>

    </div>

    <script>

        localStorage.setItem("username", "Tatiana");
    
        window.setInterval(function(){
            document.getElementById("showUsername").innerHTML = localStorage.getItem("username");
        }, 1000);

    </script>

</div>
<!-- ./ Web Storage API -->


<hr>

<!-- Web Worker API -->
<div class="row p-3">

    <h4 id="scrollspyAPIWorker">Web Worker API</h4>

    <div class="col-sm">
        
        <p><b>What is Web worker?</b></p>

        <ul>

            <li>
                Run big jobs without freezing up the page

                <ul>
                    
                    <li>
                        <p>e.g. </p>

                        <input type="number" class="form-control row my-2" id="primeFrom" placeholder="Prime Range From">

                        <input type="number" class="form-control row my-2" id="primeTo" placeholder="To">

                        <button class="btn btn-sm btn-success row my-1" onclick="primeWebWorker()" >Run Function</button>

                        <div id="primeResult"></div>

                    </li>

                    <li>
                        <p>
                            
                            Execute a complex function when click a button:

                            <br>

                            If you start doing the job right away, you'll tie everything up.

                            <br>
                        
                            They might even get the dreaded “this page is unresponsive” error message.
                                                                        
                        </p>

                    </li>
                    
                </ul>

            </li>

            <li class="overflow-scroll">

                Conversation between Web Page Code and Web Worker

                <ul>

                    <li>
                        
                        <code>postMessage()</code>

                    </li>

                    <li>
                        
                        <code>onmessage()</code>

                    </li>

                    

                </ul>

                <img src="img/web_worker.webp" alt="web_worker">

            </li>

            <li>
                Resource:
                
                <a href="https://medium.com/young-coder/a-simple-introduction-to-web-workers-in-javascript-b3504f9d9d1c" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">

                    A Simple Introduction to Web Workers in JavaScript

                </a>

            </li>                                    

        </ul>

    </div>

</div>
<!-- ./ Web Worker API -->



