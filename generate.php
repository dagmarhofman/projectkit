<HTML>
<?php
include_once "config.php";

function esc($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}

$filestr = $project_directory . $_POST['pname'] . "/" . "info.xml";
$pname = $_POST['pname'];
$xml = file_get_contents($filestr);
$xmlobj = simplexml_load_file( $filestr );

echo "<H1> Project - " . $xmlobj->title . "</H1>";
echo "<H4> Description:  " . $xmlobj->description . " </h4> ";
echo "<H4> Author:  " . $xmlobj->author . " </h4> ";
echo "<H4> Date:  " . $xmlobj->date . " </h4> ";

?>

<div id="display">
</div>
<div id="filedisplay">
</div>
  <script>
    var str = '';
    <?php
      foreach( $xmlobj->items->item as $item ) {
        $outpdata = file_get_contents( $project_directory .  $pname  ."/" . $item->href );
         echo "str = str + '" . esc($outpdata) . "';" ;
      }


      foreach( $xmlobj->items->item as $item ) {
        if( isset($item->subitems) ) {
          foreach( $item->subitems->item as $subitem ) {
            $outpdata = file_get_contents( $project_directory .  $pname  ."/" . $subitem->href );
            echo "str = str + '" . esc($outpdata) . "';";
          } 
        }
      }
    ?>
    document.getElementById('display').innerHTML = str;

<?php
    echo "var str2 = '';";
    foreach( $xmlobj->files->file as $file ) {
       echo "str2 = str2 + '<a href=\"" . dirname( $pname ) . "/" . $file->path ."\">" . $file->description . "</a><br/>';";
    }

?>
document.getElementById('filedisplay').innerHTML = str2;
</script>


</HTML>