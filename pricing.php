<?php
session_start();
include("include/header.php");
?>
<div class="container">

    <div class="col-sm-12 text-center topMargin">
        <h2 style="color: #6b6b6b">Get the access to</h2>
        <h1 style="font-weight: bold;color: #17a2b8">all time saving features</h1>
        <br/>
        <h2>Choose your plan</h2>
    </div>
    <div class="col-sm-12 row" style="margin-top: 50px;margin-bottom: 100px">
        <div class="col-sm-3">
            <h3 style="margin-top:140px;color:#17a2b8;">
                Rocket features
            </h3>
            <div class="function">Automatic categorization</div>
            <div class="function">Backup and sync</div>
            <div class="function">Detailed overview</div>
            <div class="function">100% secure</div>
            <div class="function">Import/Export of transactions</div>
            <div class="function">Share with others</div>

        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-3 pricing_card " style="text-align:center;">

                    <h3 class="card-title"> Premium</h3>
                    <p style="color:grey"> Start saving your time for what's
                        truly important in your life.</p>
                    <ul class="list-unstyled">
                        <li style="font-size: 20px; ">$45/Month</li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 pricing_card "
                     style="text-align:center;opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">

                    <h3 class="card-title"> Plus</h3>
                    <p style="color:grey">
                        Start saving your time together with your friends and family.
                    </p>
                    <ul class="list-unstyled">
                        <li style="font-size: 20px; ">$20/Month</li>

                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 pricing_card "
                     style="text-align:center;opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">

                    <h3 class="card-title"> Basic</h3>
                    <p style="color:grey"> Basic function that make your life easier</p><br/>
                    <ul class="list-unstyled">
                        <li style="font-size: 20px; ">$5/Month</li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark close-red" name="close-circle"></ion-icon>
                        </li>
                        <li>
                            <ion-icon class="checkmark" name="checkmark-circle"></ion-icon>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include("include/footer.php");
?>