
<?php
$a[] = "Anna";
$a[] = "amama";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "Hege";
$a[] = "Inga";
$a[] = "Johanna";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";


$q = $_REQUEST["q"];
$q = strtolower($q);
$len = strlen($q);
$hint = "";

if($q!==""){
  foreach($a as $name){
    if(stristr(substr($name,0, $len),$q)){
      if($hint == ""){
        $hint = $name;
  }else{
    $hint .= ",$name";
  }
    }
  }
}
  
echo $hint===""?"no suggest":$hint;
?>