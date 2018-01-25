$(document).ready(function() {
  console.log("READY");
});

function getFileInput(inputName) {
  console.log(inputName);
  $("#"+inputName).click();
}

function getAudioFileInput(inputName) {
  console.log(inputName);
  $("#"+inputName).click();
  $("#main-upload-container").hide();
}
