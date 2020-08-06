function create_table_db(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "form_addtable.php", true);
  xmlhttp.send();
}
