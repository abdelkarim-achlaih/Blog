function expand() {
  document.getElementById("nav").className = "nav-menu";
  document.getElementById("sign").className = "sign-menu";
  document.getElementById("button").className = "fas fa-arrow-up";
  var jsvar = document.getElementById("jsvar");
  var text = document.createTextNode('expanded');
  jsvar.appendChild(text);
}
function minify() {
  document.getElementById("nav").className= "";
  document.getElementById("sign").className = "sign";
  document.getElementById("button").className = "fas fa-arrow-down";
  var jsvar = document.getElementById("jsvar");
  jsvar.removeChild(jsvar.childNodes[0]);
}

var bars = document.getElementById("button");

bars.addEventListener("click",function () {
  var jsvar = document.getElementById("jsvar");
  if (jsvar.hasChildNodes()) {
    minify();
  }
  else {
    expand();
  }
}
);