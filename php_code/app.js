$(document).ready(function () {
  let left = getRandomInt(100);
  let top = getRandomInt(100);
  $("#parolaNascosta").css({ left: left + "%", top: top + "%" });
});

function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}
