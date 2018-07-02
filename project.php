<HTML>

<?php

include_once "config.php";

function esc($string)
{
    return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
}
$filestr = $project_directory . $_POST['opts'] . "/" . "info.xml";
$pname = $_POST['opts'];
$xml = file_get_contents($filestr);
$xmlobj = simplexml_load_file( $filestr );
?>

<link href="css/project.css" rel="stylesheet", type="text/css" >

<div class="leftpart">

  <?php
  echo "<h1> " . $xmlobj->title. "</h1>";
  echo "Description:<br/><br/>" . $xmlobj->description . "<br/><br/>";
  echo "Author: <br/><br/>" . $xmlobj->author . "</br><br/>";
  echo "Date: <br/><br/>" . $xmlobj->date . "</br><br/>";
  ?>


  <div class="css-treeview">
  <h4> Project items </h4>

    <ul>
    <li> <input type="checkbox" id="item-items" /><label for="item-items"><b>items</b></label>
    <ul>

    <?php
    foreach( $xmlobj->items->item as $item ) {
      if( isset($item->subitems) ) {
        echo "<li> <input type=\"checkbox\" id=\"" . $item->id . "\"/><label for=\"" . $item->id . "\">" . $item->title  .  "</label>";
        echo "<ul>";
        foreach( $item->subitems->item as $subitem ) {
          echo "<a id=\"" . $subitem->id . "\" title=\"" . $subitem->title . "\"  onclick=\"do_link('" . $subitem->id . "');\">" . $subitem->title ."</a><br/>";
        }
        echo "</ul>";
      } else {
        echo "<a id=\"" . $item->id . "\" title=\"" . $item->title . "\"  onclick=\"do_link('" . $item->id . "');\">" . $item->title ."</a><br/>";
      }
    }
    ?>


  </ul>
  </ul>

  <script>
  function do_link( par  ) {
    var str;
    <?php
      foreach( $xmlobj->items->item as $item ) {
      if( isset($item->subitems) ) {
        foreach( $item->subitems->item as $subitem ) {
          $outpdata = file_get_contents( $project_directory .  $pname  ."/" . $subitem->href );
          echo "if( par == '" . $subitem->id . "' ) {";
          echo " str = ' " . esc($outpdata) . " ' ";
          echo "}";
        } 
      }
     else {
      $outpdata = file_get_contents( $project_directory .  $pname  ."/" . $item->href );
     }
     echo "if( par == '" . $item->id . "' ) {";
     echo " str = ' " . esc($outpdata) . " ' ";
     echo "}";
     }
    ?>
  document.getElementById('display').innerHTML = str;
 }

 </script>
<h4>Project files</h4>

<?php
  foreach( $xmlobj->files->file as $file ) {
    echo  "<br> <span> " . $project_directory .  $pname  . "/" . $file->path . "</span><br/><span style=\"color:blue;\">" . $file->description . "</span>";
  }
?>

</div>

<div class="rightpart">

</div>

<div id="display" style="margin-top: -300px;">
</div>


</div>
<?php
echo " <form method=\"POST\" action=\"publish.php\" style=\"float:bottom; margin-left:0px;margin-top:150px;\">Publish project at " . $publish_directory . $_POST['opts'] . "/     " . "<input value=\"". $pname ."\" name=\"pname\" style=\"display:none;\"></value><input type=\"submit\" value=\"publish\"></input></form>";
?>

</HTML>




