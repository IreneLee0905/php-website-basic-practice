<?php
session_start();
include("include/header.php");
require_once("include/mysqli_connect.php");
?>
<div class="container">
    <div class="row topMargin ">
        <div class="col-sm-6">
            <img src="images/rocket.jpg" width="470" height="650"/>
        </div>
        <div class="col-sm-6">
            <h1 style="margin-bottom: 30px">JOIN US</h1>
            <small id="serverError" class="form-text text-danger"></small>
            <form>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" placeholder="" class="form-control" id="email">
                        <small id="emailError" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="">
                        <small id="passwordError" class="form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" placeholder="Irene" id="firstName">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Lee">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="birth">Birthday</label>
                        <select id="date" class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4" style="padding-top: 32px">
                        <select id="month" class="form-control">
                            <option value="01">Jan</option>
                            <option value="02">Feb</option>
                            <option value="03">Mar</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4" style="padding-top: 32px">
                        <select id="year" class="form-control">
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" placeholder="country" id="country">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="country">City</label>
                        <input type="text" class="form-control" placeholder="city" id="city">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" placeholder="address" id="address">
                </div>


                <div class="form-group">
                    <div class="form-check">
                        <input id="conform" type="checkbox" class="form-check-input">
                        <label for="conform">I agree to terms and conditions</label>
                    </div>

                </div>
                <button type="button" class="btn btn-info float-right" onclick="checkRegistry()">Submit
                </button>
            </form>

        </div>
    </div>
</div>
    <script>
        function checkRegistry() {
            let errors = false;
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let firstName = document.getElementById("firstName").value;
            let lastName = document.getElementById("lastName").value;
            let date = document.getElementById("date").value;
            let month = document.getElementById("month").value;
            let year = document.getElementById("year").value;
            let country = document.getElementById("country").value;
            let city = document.getElementById("city").value;
            let address = document.getElementById("address").value;

            if (password.length < 8 || password.length > 20) {
                document.getElementById("passwordError").innerHTML = "Your password must be 8-20 characters";
                document.getElementById("password").classList.add("border-danger");
                errors = true;
            } else {
                document.getElementById("passwordError").innerHTML = "";
                document.getElementById("password").classList.remove("border-danger");
            }

            //validating email
            function validateEmail(email) {
                let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            if(!validateEmail(email)){
                document.getElementById("emailError").innerHTML = "please insert the correct email";
                document.getElementById("email").classList.add("border-danger");
                errors = true;
            }else{
                document.getElementById("emailError").innerHTML = "";
                document.getElementById("email").classList.remove("border-danger");
            }

            let xmlhttp;
            if (!errors) {
                xmlhttp = new XMLHttpRequest();
                let params = `email=${email}&password=${password}&firstName=${firstName}&lastName=${lastName}&date=${date}&month=${month}&year=${year}&country=${country}&city=${city}&address=${address}`;
                xmlhttp.onreadystatechange = changePage;

                function changePage() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        if(xmlhttp.responseText!= ""){

                            document.getElementById("serverError").innerHTML = xmlhttp.responseText;
                        }else{
                            window.location.href = "/login.php";
                        }
                    }
                }

                xmlhttp.open("POST", "registerCheck.php", true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send(params);
            }
        }

    </script>
<?php
include("include/footer.php");