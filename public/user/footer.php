<?php

session_start();

error_reporting(0); 

require "../../config/connect.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM user_account WHERE email = '{$_SESSION["SESSION_EMAIL"]}'"
);

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
?>


<section>
    <link rel="stylesheet" href="footer.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .footer-list {
            text-decoration: none;
            color: #002939;
            font-size: 16px;
        }

        .footer-pad {
            color: #002939;
        }

        .footer-ico{
            text-decoration: none;
            color: #002939;
            font-size: 20px;
        }

        .header-list{
            font-size: 20px;
            font-weight: bold;
        }
    </style>

    <div style="background-color: #ddc190;">
        <br><br>
        <footer class="mainfooter" role="contentinfo">
            <div class="footer-middle">
                <div class="container">
                <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                            <div class="footer-pad">
                                <h4 class="header-list">Services</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="footer-list">Undangan</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                            <div class="footer-pad">
                                <h4 class="header-list">Lokasi</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="footer-list">Dimana?</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!--Column1-->
                            <div class="footer-pad">
                                <h4 class="header-list">Contact</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="footer-list fa fa-phone"> +62 696 6969 6969</a></li>
                                    <li><a href="#" class="footer-list fa fa-envelope"> @email.com</a></li>
                                    <li>
                                        <a href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 footer-pad">
                            <h4 class="header-list">Follow Us</h4>
                            <ul class="social-network social-circle">
                                <li><a href="#" class="icoFacebook footer-ico" title="Facebook"><i
                                            class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#" class="icoInstagram footer-ico" title="Linkedin"><i
                                            class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-12 copy footer-pad">
                            <p class="text-center" style="font-size: 14px;">&copy; Copyright 2022 - Invate. All rights reserved.</p>
                        </div>
                    </div>


                </div>
            </div>
        </footer>
    </div>

</section>

