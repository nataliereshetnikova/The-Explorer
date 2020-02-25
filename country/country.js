    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      let drop = document.getElementById("myDropdown");
      drop.classList.toggle("show");
      document.addEventListener('click', (e)=>{
        if(e.target.classList[0] != "dropbtn"){
          drop.classList.remove("show");
        }
    });
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
      window.onload = () =>{
      let addBtns = document.querySelectorAll('.add');
      let chosen = document.querySelectorAll('#chosen')[0];
      let myUl = document.createElement("ul");
      addBtns.forEach((li) => {
        chosen.appendChild(myUl);
          li.addEventListener('click', function () {
              //add to the list of chosen countries
              let myLi = document.createElement("li");
              myLi.id=li.id;
              myLi.innerHTML=li.id+' -';
              myUl.appendChild(myLi);
              myLi.addEventListener('click', function(){
                myLi.parentElement.removeChild(myLi);
              });
              //disable itself
              li.parentElement.removeChild(li);
        });
      });
    }


