<?php
echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



'; ?>
<!-- <script src="assets/js/main.js"></script> --> 
<style>
     a.mygt {
     color: white;
    }

        table {
            
            margin-top: 0px;
        }
        .container {
            position: absolute;
            float: right;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
        }
        .alert.alert-success, .alert.alert-danger {
    margin-top: 4.0625rem;
    
        }
        a.btn.btn-primary {
    margin-left: -215px;
    margin-top: -3px;
}
.isvalyti {
    /* margin-left: -215px; */
    margin-bottom: 10x;
    width: 13.75rem;
    float: right;
}
a:link, a:visited {
    text-decoration: none white;
}
/* rugsėjo 11, 13, 15 */
.naujas {
    float: left;
    margin-top: 45px;
    margin-left: -510px;
    text-decoration: white;
    color: white;
}
.paieska  {
    float: left;
margin-top: 45px;
    margin-left: 200px;
}
        .form-group {
            margin-top: -11px;
            float: left;
        }

        .form-control {
            float: left;
        }
    .atsijungti {
            float: right;

            <?php 
$vartotojas = explode("|", $_COOKIE["prisijungta"]);
            if ($vartotojas[3] != 1) { 
            echo "margin-right: -17.8125rem;";   
                 } else {
                    echo "margin-right: -21.5625rem;";
             } ?>
           
        }
        h5 {
            float: right;
            margin-top: 5px;
            margin-right: 100px;
        }
/* .alert {
    display: none;
} */




</style>