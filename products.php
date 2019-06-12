<?php

session_start();
include("include/header.php");
?>
<div class="container">
<br/>
<fieldset class=" mx-auto col-sm-8" style="margin: 10px;padding:20px;">
    <legend >Search</legend>
    <form >
        <div class="input-group">
            <input type="text" id="search" class="form-control" placeholder="" aria-describedby="search">
            <div clas="input-group-append">
                <button class="btn btn-outline-info" type="button" id="searchBtn" onclick="checkSearch()">Search Product</button>
            </div>

        </div>
    </form>

    <script>
        function checkSearch() {
            document.getElementById("result").innerHTML = "";
            let search = document.getElementById("search").value;
            let xmlhttp = new XMLHttpRequest();


            function changePage() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                }
            }

            xmlhttp.onreadystatechange = changePage;
            xmlhttp.open("get", "searchCheck.php?search=" + search);
            xmlhttp.send();


        }

    </script>
</fieldset>

<div id="result">

</div>
<br/><br/>

<?php
include("include/footer.php");
?>
