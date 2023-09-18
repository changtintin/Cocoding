<!DOCTYPE html>

<html lang="en">

<?php
    include "./include/header.php";
?>

<style>

    /* ============ desktop view ============ */
    @media all and (min-width: 992px) {

        .dropdown-menu li {
            position: relative;
        }

        .nav-item .submenu {
            display: none;
            position: absolute;
            right: 100%;
            top: -7px;
        }

        .nav-item .submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover {
            background-color: #f1f1f1
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }

        #subJSNav{
            display: none;
        }

    }
    /* ============ desktop view . ./ // ============ */

    /* ============ small devices ============ */
    @media (max-width: 991px) {

        .dropdown-menu .dropdown-menu {
            margin-left: 0.7rem;
            margin-right: 0.7rem;
            margin-bottom: .5rem;
        }

        .dropdown-menu>li:hover>.submenu {
            display: block;
        }

        #carouselExampleDark{
            display: none;
        }

        #JSNav{
            display: none;
        }

        #subJSNav{
            display: block;
        }
    }
    /* ============ small devices . ./ // ============ */

</style>

<!-- Fontawesome Icons -->
<script src="https://kit.fontawesome.com/a0b3a023f8.js" crossorigin="anonymous"></script>

<!-- jQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- <script src="js/bootstrap.bundle.js"> </script> -->

<body class="container-fluid" onpageshow="pageShow()">

    <div>

        <button class="btn btn-lg btn-secondary m-3 rounded-circle" id="scrollspyTop" onclick="toTop()">

            <i class="material-icons">arrow_upward</i>

            <br>

            <b>TOP</b>

        </button>

        <div class="d-block">

            <?php include "include/nav/nav.php"; ?>

            <div class="main-font">

                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">


                    <!-- Route to Pages -->
                        <?php include "./include/route.php"; ?>
                    <!-- ./ Route to Pages -->


                </div>
                <!--  ./  data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0" -->

            </div>
            <!--  ./  main-font -->

        </div>
        <!--  ./  d-none d-lg-block p-2 -->

    </div>
    <!--  ./  container-fluid p-0 overflow-auto -->

    <!-- Footer -->
    <?php include "./include/footer.php"; ?>

    <script src="js/script.js"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>