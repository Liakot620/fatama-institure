<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ajax</title>
  <script>
    function show (str){
      if(str == ""){
        document.getElementById("demo").innerHTML = "";
      }else{
        var x = new XMLHttpRequest();
        x.onreadystatechange=function(){
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
          }
        }
        x.open("GET", " array.php?q=" + str, true);
         x.send();
      }
    }
  </script>
</head>
<body>
  <h2>Enter you input:</h2>
  <from>
    <input type="text" placeholder="search ......." onkeyup="show(this.value)">
  </from>
  <div>
    <h3>suggested:<span id="demo"></span></h3>
  </div>
</body>
</html>