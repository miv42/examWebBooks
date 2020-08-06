/*
  No chestia asta tre sa puna un formular de adaugare a unei carti
  in div-u' de content. Si de acolo is alte functii dupa.
*/
function add_book_db(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "form_addbook.php", true);
  xmlhttp.send();
}

/*
  Afiseaza toate cartile dar in loc de butonu de add e unu de delete
*/
function remove_book_db(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "view_delete.php", true);
  xmlhttp.send();
}

function delete_forever(val){
  var idd = val.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if(this.responseText === 'succ'){
            alert("Successfully removed from DB!");
            remove_book_db();
          }
        }
  };
  xmlhttp.open("GET", "removebookdb.php?idd=" + idd , true);
  xmlhttp.send();
}
