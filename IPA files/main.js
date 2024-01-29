function myfunction() {
  alert("Your file will install once you click ok");
}

const search = () => {
  const searchbox = document.getElementById("search").value.toUpperCase();
  const storeitems = document.getElementById("ipa-list")
  const file = document.querySelectorAll(".file")
  const fname = storeitems.getElementsByTagName("h2")

  for(var i = 0; i < fname.length; i++) {
    let match = file[i].getElementsByTagName('h2')[0];

    if(match) {
      let textvalue = match.textContent || match.innerHTML

      if(textvalue.toUpperCase().indexOf(searchbox) > -1) {
        file[i].style.display = "";
      }else {
        file[i].style.display = "none";
      }
    }
  }
}