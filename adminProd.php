<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="lib/css/v4/w3.css">
<link rel="stylesheet" href="lib/css/font-awesome-4.7.0/css/font-awesome.min.css">
<script src="lib/js/angular.min.js"></script>
<script type="text/javascript" src="Angular/adminProd.js"></script>
<script type="text/javascript" src="lib/js/jquery-2.1.3.js"></script>

<body class="w3-light-grey" ng-app="adminProd">

<side-bar></side-bar>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <admin-prod-content></admin-prod-content>
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}

function checkextension() {
  var file = document.querySelector("#fileUpload");
  if ( /\.(jpe?g|png)$/i.test(file.files[0].name) === false ) { alert("not an image!"); }
}

</script>

</body>
</html>
