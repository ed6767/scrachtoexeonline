<html>
<head>
<meta charset="UTF-8"><title>Scratch to EXE</title>
<script>
function checkImage(imageSrc, good, bad) {
    var img = new Image();
    img.onload = good; 
    img.onerror = bad;
    img.src = imageSrc;
}
</script>
</head>
<body style="font-family:Arial" onload='checkImage("http://uploads.scratch.mit.edu/projects/thumbnails/<?php echo $_POST['ID']; ?>.png", function(){  }, function(){ window.location.replace("index.php?error=The project ID is invalid"); } );'>
<center>

<img src="/edx/logo.jpg" />
<h3>Scratch to EXE</h3>
<br><br>

<img src="//uploads.scratch.mit.edu/projects/thumbnails/<?php echo $_POST['ID']; ?>.png" />
<h3>Step 2 - Type in some details</h3>
<h5>Details about the project</h5>
<form action="step3.php" method="POST">
<input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>">
Project name:<br>
  <input type="text" name="PRJ" value="Project Name"><br>
Created by:<br>
<input type="text" name="CRT" value="ScratchUser"><br>
<input type="submit" value="Next step">
</form>
</center>
</body>
</html>