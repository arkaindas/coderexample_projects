const imageDetect = async () => {
  const img = document.getElementById("preview");
  const status = document.getElementsByClassName("status")[0];

  status.innerHTML = "initializing model";
  const model = await mobilenet.load();

  status.innerHTML = "Initialized";

  const predictions = await model.classify(img);
  console.log("predictions",predictions);
  status.innerHTML = predictions[0].className;
};

function readURL(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function(e) {
      $(".image-upload-wrap").hide();

      $(".file-upload-image").attr("src", e.target.result);
      $(".file-upload-content").show();

      $(".image-title").html(input.files[0].name);
      imageDetect();
    };

    reader.readAsDataURL(input.files[0]);
  } else {
    removeUpload();
  }
}

function removeUpload() {
  $(".file-upload-input").replaceWith($(".file-upload-input").clone());
  $(".file-upload-content").hide();
  $(".image-upload-wrap").show();
}
$(".image-upload-wrap").bind("dragover", function() {
  $(".image-upload-wrap").addClass("image-dropping");
});
$(".image-upload-wrap").bind("dragleave", function() {
  $(".image-upload-wrap").removeClass("image-dropping");
});
