<html>
<head><meta charset="UTF-8"><title>Scratch to EXE</title></head>
<body style="font-family:Arial">
<center>

<img src="/edx/logo.jpg" />
<h3>Scratch to EXE</h3>
<br><br>
<h3>Step 3 - Select design and settings</h3>
<h5>Select the design you want for your app</h5>
<form action="build.php" method="POST">
<input type="hidden" name="ID" value="<?php echo $_POST['ID']; ?>">
<input type="hidden" name="PRJ" value="<?php echo $_POST['PRJ']; ?>">
<input type="hidden" name="CRT" value="<?php echo $_POST['CRT']; ?>">
Message if there's no internet connection:<br>
  <input type="text" name="NOWEB" value="Sorry, there's no connection."><br>
Window look:<br>
<select name="LOOK">
  <option value="Default">Standard</option>
  <option value="none">Scratch Project only</option>
  <option value="invisible">Full screen</option>

</select><br>
<input type="checkbox" name="HIDEBAR" value="yes">Hide the project information bar<br>
<input type="submit" value="Build and download">

</form>
<h4>Please open the app to complete the final step before sharing it!</h4>
<h5>Please report bugs to ed@edxtech.uk.</h5>
<h5>If you want to share your EXE, please don't link to our server. It is cleared regularly.</h5>
</center>
</body>
</html>