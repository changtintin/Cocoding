<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted" style="padding-top:100px ;">

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-left">
          <!-- Content -->
          <h5 class="text-uppercase fw-bold mb-4">
            COCODING.Co
          </h5>
          <p>
            <?php echo _FOOTER_INTRO; ?>          
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2  mx-auto mb-4 text-left" style="font-size: smaller;">
          <!-- Links -->
          <h5 class="fw-bold mb-4">
            <?php echo _PRODUCTS; ?>
          </h5>
          <p>
            <a href="#">
              <?php echo _MOBILE;?>
            </a>
          </p>
          <p>
            <a href="#">
              <?php echo _DESKTOP; ?>
            </a>
          </p>
          <p>
            <a href="#" >
              <?php echo _PUBLISH;?>
            </a>
          </p>
         
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 text-left" style="font-size: smaller;">
          <!-- Links -->
          <h5 class="text-uppercase fw-bold mb-4 footer-header">
            <?php echo _LINKS;?>
          </h5>
          <p>
            <a href="#!" class="text-monospace">
              <?php echo _ORDER;?>
            </a>
          </p>
          <p>
            <a href="#!" class="text-monospace">
              <?php echo _SETTING;?>
            </a>
          </p>
          <p>
            <a href="#!" class="text-monospace">
              <?php echo _HELP;?>
            </a>
          </p>
          <p>
            <a href="contact.php?lang=<?php echo $_SESSION['lang'];?>" class="text-monospace">
              <?php echo _PRICING; ?>
            </a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 text-left ">
          <!-- Links -->
          <h5 class="text-uppercase footer-header">
            <a href="contact.php?lang=<?php echo $_SESSION['lang'];?>">
              <?php echo _CONTACT_NAV?>
            </a>
          </h5>
          <p> 
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
              <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
            </svg>
            Taiwan, Taichung 406, NUTC 2502Lab
          </p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
              <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
            </svg>
            Cocoding@tatianachang.com
          </p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>
            <a href="https://www.facebook.com/tintin.chang.73">Tintin Chang</a>
          </p>
          
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
              <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg>
            <a href="https://github.com/changtintin/Cocoding">changtintin</a><br>
          </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);" id = "bottom">
    © 2023 Copyright: https://tatianachang.com/
    <a class="text-reset fw-bold" href="#">Cocoding/</a>
  </div>
  <!-- Copyright -->
</footer>

<!-- Footer -->