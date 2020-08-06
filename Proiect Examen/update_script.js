
function update_book_db(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "view_update.php", true);
  xmlhttp.send();
}

function update_info_book(val){
  var idd = val.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "form_updatebook.php?idd=" + idd, true);
  xmlhttp.send();
}
