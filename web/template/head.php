<head>
  <title>Questionary</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  
  <script>
    function slidedownRadio(){
        if ($('#radio2').is(':checked')) {
          $('.input3-select').slideDown(300)
        };
    }

    window.onload = function(){
      alert('window.onload');
    };

    window.onpageshow = function(){
      alert('window.onpageshow');
    };
  </script>
</head>