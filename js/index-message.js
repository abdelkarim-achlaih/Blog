function appearElement(id) {
  document.getElementById(id).className = "index-message-appear";
}
function hideElement(id) {
  document.getElementById(id).className = "index-message-hide";
}
setTimeout(appearElement, 2500, "hide");
setTimeout(hideElement, 5000, "hide");

