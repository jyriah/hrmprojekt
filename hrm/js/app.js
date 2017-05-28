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

function editEmployee(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("data").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "views/edit_employee.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("id=" + id);
}

function modifyEmployee(id) {
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var department = document.getElementById("department").value;
	var position = document.getElementById("position").value;
	var email = document.getElementById("email").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("data").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "modify_employee.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("firstname=" + firstname + "&lastname=" + lastname + "&department=" + department + "&position=" + position + "&email=" + email + "&id=" + id);
}

function addEmployee() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange=function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("data").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "views/add_employee.php", true);
	xhttp.send();
}

function insertEmployee() {
	var firstname = document.getElementById("firstname").value;
	var lastname = document.getElementById("lastname").value;
	var department = document.getElementById("department").value;
	var position = document.getElementById("position").value;
	var email = document.getElementById("email").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("data").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "insert_employee.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("firstname=" + firstname + "&lastname=" + lastname + "&department=" + department + "&position=" + position + "&email=" + email);
}