<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajax Database</title>
</head>
<body>
    <!-- Code Input and show data -->
    Nama Mahasiswa &nbsp;:&nbsp;&nbsp;
    <input type="text" onkeyup="showMhs(this.value)">
    <div id="show"></div>
</body>
</html>


<script>
    function showMhs(str) {
        if (str == "") {
            document.getElementById("show").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show").innerHTML = this.responseText;
            }
            };
            
            // Open web service and send request
            xmlhttp.open("GET","GetMahasiswa.php?nama="+str,true);
            xmlhttp.send();
        }
    }
</script>

