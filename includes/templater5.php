<?

// SuperHTML Class Def
class codeBlock{

  //properties
  var $title;
  var $thePage;

  function __construct($tTitle = "Super HTML"){
    //constructor
    $this->setTitle($tTitle);
  } // end constructor

  function getTitle(){
    return $this->title;
  } // end getTitle

  function setTitle($tTitle){
    $this->title = $tTitle;
  } // end setTitle

  function getPage(){
    return $this->thePage;
  } // end getPage

  //most basic tags
  function addText($content){
    //given any text (including HTML markup)
    //adds the text to the page
    $this->thePage .= $content;
    $this->thePage .= "\n";
  } // end addText

  function gAddText($content){
    //given any text (including HTML markup)
    //returns the text
    $temp= $content;
    $temp .= "\n";
    return $temp;
  } // end addText

  function buildTop($stylesheet=NULL){
  //check for a valid stylesheet
  if($stylesheet!=NULL){
    $stylesheet = "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$stylesheet."\" />";
  }
    $temp = <<<HERE
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html>
<head>
<title>$this->title</title>
$stylesheet
</head>
<body>
HERE;
    $this->addText($temp);
  } // end buildTop;

  function buildBottom(){
    //builds the bottom of a generic web page
    $temp = <<<HERE
</body>
</html>
HERE;
    $this->addText($temp);
  } // end buildBottom;

  //general tag function
  function tag($tagName, $contents, $class=NULL, $id=NULL){
    //given any tag, surrounds contents with tag
    //improve so tag can have attributes
    $this->addText($this->gTag($tagName, $contents, $class, $id));
  } // end tag

  function gTag($tagName, $contents, $class, $id){
    //given any tag, surrounds contents with tag
    //improve so tag can have attributes
    //returns tag but does not add it to page
    if($class !=NULL){
      $class = " class=\"".$class."\"";
    }
    if($id != NULL){
    $id = " id=\"". $id ."\"";
   }
    $temp .= "<$tagName".$class."".$id.">\n";

    $temp .= "  " . $contents . "\n";
    $temp .= "</$tagName>\n";
    return $temp;
  } // end tag

  //header functions
  function h1($stuff, $class = NULL, $id = NULL){
    $this->tag("h1", $stuff, $class, $id);
  } // end h1

  function h2($stuff, $class = NULL, $id = NULL){
    $this->tag("h2", $stuff, $class, $id);
  } // end h2

  function h3($stuff, $class = NULL, $id = NULL){
    $this->tag("h3", $stuff, $class, $id);
  } // end h3

  function h4($stuff, $class = NULL, $id = NULL){
    $this->tag("h4", $stuff, $class, $id);
  } // end h4

  function h5($stuff, $class = NULL, $id = NULL){
    $this->tag("h5", $stuff, $class = NULL, $id = NULL);
  } // end h5

  function h6($stuff, $class = NULL, $id = NULL){
    $this->tag("h6", $stuff, $class = NULL, $id = NULL);
  } // end h6

  function gBuildList($theArray, $type = "ul"){
    //given an array of values, builds a list based on that array
    $temp= "<$type> \n";
    foreach ($theArray as $value){
      $temp .= " <li>$value</li> \n";
    } // end foreach
    $temp .= "</$type> \n";
    return $temp;
  } // end gBuildList

  function buildList($theArray, $type = "ul"){
    if($type != "ul" && $type != "ol"){
      $type = "ul";
    }
    $temp = $this->gBuildList($theArray, $type);
    $this->addText($temp);
  } // end buildList

  function gBuildTable($theArray){
    //given a 2D array, builds an HTML table based on that array
    $table = "<table border = 1> \n";
    foreach ($theArray as $row){
      $table .= "<tr> \n";
      foreach ($row as $cell){
        $table .= "  <td>$cell</td> \n";
      } // end foreach
      $table .= "</tr> \n";
    } // end foreach
    $table .= "</table> \n";

    return $table;
  } // end gBuildTable

  function buildTable($theArray){
    $temp = $this->gBuildTable($theArray);
    $this->addText($temp);
  } // end buildTable


  function startTable($border = "1"){
    $this->thePage .= "<table border = \"$border\">\n";
  } // end startTable

  function tRow ($rowData, $rowType = "td"){
    //expects an array in rowdata, prints a row of th values
    $this->thePage .= "<tr> \n";
    foreach ($rowData as $cell){
      $this->thePage .= "  <$rowType>$cell</$rowType> \n";
    } // end foreach
    $this->thePage .= "</tr> \n";
  } // end thRow

  function endTable(){
    $this->thePage .= "</table> \n";
  } // end endTable

  //form elements
  function gTextbox($name, $value = ""){
    // returns but does not print
    // an input type = text element
    // used if you want to place form elements in a table
    $temp .= <<<HERE
<input type = "text"
       name = "$name"
       value = "$value" />

HERE;
    return $temp;
  } // end textBox

  function textbox($name, $value = ""){
    $this->addText($this->gTextbox($name, $value));
  } // end textBox

  function gSubmit($value = "Submit Query"){
    // returns but does not print
    // an input type = submit element
    // used if you want to place form elements in a table
    $temp .= <<<HERE
<input type = "submit"
       value = "$value" />

HERE;
    return $temp;
  } // end submit

  function submit($value = "Submit Query"){
    $this->addText($this->gSubmit($value));
  } // end submit

  function gSelect($name, $listVals){
    //given an associative array,
    //prints an HTML select object
    //Each element has the appropriate
    //value and displays the associated name
    $temp = "";
    $temp .= "<select name = \"$name\" >\n";
    foreach ($listVals as $val => $desc){
      $temp .= "  <option value = \"$val\">$desc</option> \n";
    } // end foreach
    $temp .= "</select> \n";
    return $temp;

  } // end gSelect

  function select($name, $listVals){
    $this->addText($this->gSelect($name, $listVals));
  } // end buildSelect

  function formResults(){
    //returns the names and values of all form elements
    //in an HTML table
    $this->startTable();
    foreach ($_REQUEST as $name => $value){
      $this->tRow(array($name,$value));
    } // end foreach
    $this->endTable();
  } // end formResults

} // end class def

?>