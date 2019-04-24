<html>
<head><meta charset="UTF-8"><title>Scratch to EXE</title></head>
<body style="font-family:Arial">
<center>

<img src="/edx/logo.jpg" />
<h3>Scratch to EXE</h3>
<br><?php echo $_GET['error']; ?><br>

<h3>Step 1 - Type your scratch project ID</h3>
<h5>This is the number at the end of all scratch URL's, so if my URL was scratch.mit.edu/projects/160878514/ my project ID would be 160878514</h5>
<form action="step2.php" method="POST">

  <input type="text" name="ID" value="Scratch ID"><br>
<input type="submit" value="Next step">
</form>
<br>
<h5>
<a href="http://scratch.mit.edu/users/myed">Follow me on scratch</a><br>
<?php $fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
printf("%d projects have been converted with this tool since its release on April 3rd 2017", iterator_count($fi) + 2830); ?>
<br>
Update log:
<br>
3/4/17 - Online converter released - Offline converter discontinued
<br>
<br>
Tutorials in:
<a href="https://www.youtube.com/watch?v=Qv1ixP9iwmY">Arabic - للحصول على تعليمي عربي، يرجى الضغط هنا</a>
</h5>
</center>
</body>
</html>