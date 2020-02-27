/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  let drop = document.getElementById("myDropdown");
  drop.classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  li = div.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    txtValue = li[i].textContent || li[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
window.onload = () => {
  let addBtns = document.querySelectorAll('.add');
  let chosen = document.querySelectorAll('#chosen')[0];
  let myUl = document.createElement("ul");
  //check if cookies have previous values
  let myLi;
  for(let i=1;i<=3;i++){
    if(getCookie(i).length>0){
      myLi = document.createElement("li");
      myLi.innerHTML = getCookie(i);
      myLi.id = getCookie(i);
      myUl.appendChild(myLi);
            //add to the query string of all buttons
            let menuBtn = document.querySelectorAll('nav ul li a');
            for(let i=0;i<5;i++){
            if(menuBtn[i].href.includes(myUl.childElementCount)){
              menuBtn[i].href.replace(`&${myUl.childElementCount}=/^[A-Z]{3}$/`, `&${myUl.childElementCount}=${li.id}`);
              } else{
                menuBtn[i].href += `&${myUl.childElementCount}=${myLi.id}`;
              }
          }
                      //when user wants to remove element from the list
                      myLi.addEventListener('click', function () {
                        //remove from cookie
                        document.cookie = myUl.childElementCount+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                        //remove from the chosen list
                        myLi.parentElement.removeChild(myLi);
                      });
    }

  }
  //add event to the each button in dropdown list
  addBtns.forEach((li) => {
    chosen.appendChild(myUl);
    li.addEventListener('click', function () {
      //check if there is less than 3 countries in the list already
      if (myUl.childElementCount < 3) {
        //add to the list of chosen countries
        let myLi = document.createElement("li");
        myLi.id = li.id;
        myLi.innerHTML = li.innerHTML.replace('+','-');
        myUl.appendChild(myLi);
        //disable itself
        li.parentElement.removeChild(li);
        //add to the query string of all buttons
        let menuBtn = document.querySelectorAll('nav ul li a');
        for(let i=0;i<5;i++){
          if(menuBtn[i].href.includes(myUl.childElementCount)){
            menuBtn[i].href.replace(`&${myUl.childElementCount}=/^[A-Z]{3}$/`, `&${myUl.childElementCount}=${li.id}`);
          } else{
            menuBtn[i].href += `&${myUl.childElementCount}=${li.id}`;
          }
        }
        //add to cookies
        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 1000*36000;
        now.setTime(expireTime);
        document.cookie = `${myUl.childElementCount}=${li.id};expires=${now.toGMTString()};path=/`;
        //when user wants to remove element from the list
        myLi.addEventListener('click', function () {
          //remove from cookie
          document.cookie = myUl.childElementCount+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
          //remove from the chosen list
          myLi.parentElement.removeChild(myLi);
          //add back to the dropdown
          let dropdown = document.querySelectorAll("#myDropdown")[0];
          myLi.innerHTML = li.innerHTML.replace('-','+');
          dropdown.appendChild(myLi);
        });
      }
    });
  });
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
