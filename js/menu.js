function expand() {
  document.getElementById("nav-container").className = "nav-container";
  var jsvar = document.getElementById("jsvar");
  var text = document.createTextNode('expanded');
  jsvar.appendChild(text);
}
function minify() {
  document.getElementById("nav-container").className = "nav-container hidden";
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