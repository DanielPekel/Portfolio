<?php
// TODO - make for mobile
if(!isset($_SESSION['username'])){ ?>
    <script>
    window.location.href = "/login";
    </script>
 <?php }
?>
<div class="container-fluid dashboardgrey p-0 m-0">
    <div class="row m-0">
        <div class="col-2 vh-100 text-white d-none d-md-block py-2">
            <div class="sidebar">
                <div class="container pt-3">
                    <div class="row pt-2">
                        <div class="col-4 profile"></div>
                        <div class="col-8">
                            <div class="container py-4">
                                <h5 class="fs-6">Daniël Pekel</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="menuitem">
                        <a href="https://localhost/Portfolio/dashboard">Dashboard</a>
                    </div>
                    <div class="menuitem">
                        <a href="https://localhost/Portfolio/dashboard/taken">Taken</a>
                    </div>
                    <div class="menuitem">
                        <a href="https://localhost/Portfolio/dashboard/contacten">Contacten</a>
                    </div>
                    <div class="menuitem">
                        <a href="https://localhost/Portfolio/dashboard/ideeen">Ideeën</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10">
