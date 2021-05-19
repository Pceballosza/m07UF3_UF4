       function showUser(str) {
            if (str == "") {
                document.getElementById("divOverflow").innerHTML = "";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 3 && this.status == 200) {
                    document.getElementById("divOverflow").innerHTML = this.responseText;
                }
            }
            xmlhttp.open("GET", "tablaUF4.php?q=" + str, true);
            xmlhttp.send();
        }