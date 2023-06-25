<!DOCTYPE html>
<?php
    include "includes/header.php";
?>

<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId            : '255707960180137',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v16.0'
                });
            };
          
            FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
              statusChangeCallback(response);        // Returns the login status.
            });
        };
        
        
    </script>
    
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0&appId=255707960180137&autoLogAppEvents=1" nonce="2PX2356u"></script>
    

    <!-- Page Content -->
    <div class="container post-container">
        <div class="row">
            <h1>Facebook API</h1>

            <script>
                function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
                    console.log('statusChangeCallback');
                    console.log(response);                   // The current login status of the person.
                    
                    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                      testAPI();  
                    } 
                    else {                                 // Not logged into your webpage or we are unable to tell.
                      document.getElementById('status').innerHTML = 'Please log ' +'into this webpage.';
                    }
                }
    
    
              function checkLoginState() {               // Called when a person is finished with the Login Button.
                FB.getLoginStatus(function(response) {   // See the onlogin handler
                  statusChangeCallback(response);
                });
              }
             
              function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', {'fields': 'id,name,email,picture'},function(response) {
                  console.log('Successful login for: ' + response.name);
                  document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.name + '! <br>' + 'Email:'+response.email;
                });
              }
            
            </script>


<!-- The JS SDK Login Button -->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

<!-- Load the JS SDK asynchronously -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>
</html>
    
                    
                
                
                
        </div>

           
    </div>    

        

</body>

</html>