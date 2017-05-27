function loadView(view) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange=function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "controller.php?action=" + view, true);
  xhttp.send();
}

function deleteEmployee(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "remove_employee.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id=" + id);
}
