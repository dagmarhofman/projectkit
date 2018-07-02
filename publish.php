<HTML>
<?php
include_once "config.php";

ob_start();
include 'generate.php';
$string = ob_get_clean();
if( mkdir( $publish_directory . $pname ) == false ) {
    echo "mkdir: <span style=\"color: red\">" . $publish_directory . $pname . "</span>";
} else {
    echo "mkdir: <span style=\"color: green\">" . $publish_directory . $pname . "</span>";
}
file_put_contents( $publish_directory . $pname . "/index.html", $string );

$filestr = $project_directory . $_POST['pname'] . "/" . "info.xml";
$xmlobj = simplexml_load_file( $filestr );

foreach( $xmlobj->files->file as $file ) {
    $fromstr = $project_directory . $pname . "/" . $file->path;
    $tostr = $publish_directory . $pname . "/" . $file->path; 
    if ( copy( $fromstr, $tostr ) == false ) {
    echo "<br/>copy: <span style=\"color: red;\"> " . $fromstr . " to " . $tostr . "</span><br/>";
    } else {
    echo "<br/>copy: <span style=\"color: green;\">" . $fromstr . " to " . $tostr . "</span><br/>";
    }
}
?>


</HTML>