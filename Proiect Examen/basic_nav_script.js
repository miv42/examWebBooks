//cand deschide fereastra da retrieve la numele utilizatorului pt further use
window.onload = function(){
  var url = document.location.href,
        params = url.split('?')[1].split('&'),
        data = {}, tmp;
    for (var i = 0, l = params.length; i < l; i++) {
         tmp = params[i].split('=');
         data[tmp[0]] = tmp[1];
    }
    document.getElementById('username-div').innerHTML = data.name;
};

// arata toate cartile si pune si divu cu options
function init_allbooks(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "initbooks.php", true);
  xmlhttp.send();
}

// genres
function ajaxFilter(str) {
        str=str.value;
          var xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("carti").innerHTML = this.responseText;
                }
          };
        xmlhttp.open("GET", "showbooks.php?q=" + str, true);
        xmlhttp.send();
    }

function show_my_books(){
  var str = document.getElementById('username-div').textContent;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          document.getElementById("content").innerHTML = this.responseText;
        }
  };
  xmlhttp.open("GET", "showmybooks.php?q=" + str, true);
  xmlhttp.send();
}

function add_book_user(val){
  var str = document.getElementById('username-div').textContent;
  var idd = val.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if(this.responseText === 'aadd'){
            alert("Already Added");
          }
          if(this.responseText === 'succ'){
            alert("Successfully Added to your Collection!");
          }
        }
  };
  xmlhttp.open("GET", "addbookuser.php?q=" + str + "&idd=" + idd , true);
  xmlhttp.send();
}

function remove_book_user(val){
  var str = document.getElementById('username-div').textContent;
  var idd = val.value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if(this.responseText === 'succ'){
            alert("Successfully removed from your Collection!");
            show_my_books();
          }
        }
  };
  xmlhttp.open("GET", "removebookuser.php?q=" + str + "&idd=" + idd , true);
  xmlhttp.send();
}

function search_by_text(){
  var str = document.getElementById('searchboxid').value;
  //alert(str);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("content").innerHTML = this.responseText;
          }
        }
  };
  xmlhttp.open("GET", "searchbooks.php?q=" + str, true);
  xmlhttp.send();
}
