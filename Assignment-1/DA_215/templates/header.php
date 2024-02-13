
<head>
    <title>Assignment-1</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding:20px;
        }
        [type="radio"]:not(:checked), [type="radio"]:checked {
            position: relative; 
            opacity: 1; 
       }
    </style>
</head>
    <body class = "grey lighten-4">
        <nav class ="white z-depth-0"> 
            <div class ="container">
                <a href = "index.php" class ="brand-logo brand-text"> Guwahati Pharmacy</a>
                <ul id ="nav-mobile" class = "right hide-on-small-and-down">
                    <li><a href="patient.php" class = "btn brand z-depth-0">Add a Patient</a></li>
                    <li><a href="doctor.php" class = "btn brand z-depth-0">Add a Doctor</a></li>
                </ul>
            </div>
        </nav>
