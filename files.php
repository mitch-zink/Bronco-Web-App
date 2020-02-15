<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Center the loading */
#loading {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:0px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:0px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#div1 {
  display: none;
  text-align: center;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loading"></div>

<div style="display:none;" id="div1" class="animate-bottom">
<head>
  <link rel="stylesheet" type="text/css" href="css.css">
  <?php
include("navbar.php")
?>
<iframe src="https://onedrive.live.com/embed?cid=35A8B4903B56E3A9&resid=35A8B4903B56E3A9%21140489&authkey=AKWMRh8W3Lsesvk" width="165" height="128" frameborder="0" scrolling="no"></iframe>
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loading").style.display = "none";
  document.getElementById("div1").style.display = "block";
}
</script>

</body>
</html>
