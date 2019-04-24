There was an error. email ed@edxtech.uk with this info.
<?php
$dirname = generateRandomString();
mkdir($dirname);
mkdir($dirname . "/core");
copy("/home/edxtechu/public_html/data/scratchtoexe/files/runthing.exe", $dirname . "/" . $_POST['PRJ'] . ".exe");
copy("theicon.ico", $dirname . "/core/icon.ico");
$myfile = fopen($dirname . "/core/title.dat", "w") or die("Unable to open file!");
$txt = $_POST['PRJ'];
fwrite($myfile, $txt);
fclose($myfile);
$myfile = fopen($dirname . "/core/creator.dat", "w") or die("Unable to open file!");
$txt = $_POST['CRT'];
fwrite($myfile, $txt);
fclose($myfile);
$myfile = fopen($dirname . "/core/nointernet.dat", "w") or die("Unable to open file!");
$txt = $_POST['NOWEB'];
fwrite($myfile, $txt);
fclose($myfile);
$myfile = fopen($dirname . "/core/pannel.dat", "w") or die("Unable to open file!");
$txt = $_POST['LOOK'];
fwrite($myfile, $txt);
fclose($myfile);
if ($_POST['HIDEBAR'] == "yes") {
$myfile = fopen($dirname . "/core/hideinfo.dat", "w") or die("Unable to open file!");
$txt = "hide";
fwrite($myfile, $txt);
fclose($myfile);
}
$myfile = fopen($dirname . "/core/link.dat", "w") or die("Unable to open file!");
$txt = "https://scratch.mit.edu/projects/embed/". $_POST['ID'] . "/?autostart=true";
fwrite($myfile, $txt);
fclose($myfile);

//MAKE CORE.DLL
$rootPath = realpath($dirname . "/core");

// Initialize archive object
$zip = new ZipArchive();
$zip->open($dirname . '/CORE.DLL', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
deleteDir($dirname . "/core");
//MAKE ZIP
$rootPath = realpath($dirname);

// Initialize archive object
$zip = new ZipArchive();
$zip->open($dirname . '.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
deleteDir($dirname); //Delete directory
header( 'Location: http://www.edxtech.uk/data/scratchtoexe/converter/'. $dirname .'.zip' ) ;


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
};

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
};
?>