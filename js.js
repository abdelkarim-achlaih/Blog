function appearElement(id) {
  document.getElementById(id).className = 'index-message-appear';
}
function hideElement(id) {
  document.getElementById(id).className = 'index-message-hide';
}
setTimeout(appearElement, 500, 'hide');
setTimeout(hideElement, 3000, 'hide');