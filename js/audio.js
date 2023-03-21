function cambiarAudio(src, img, title, desc) {
  document.getElementById("audio").src = src;
  document.getElementById("audio").load();
  document.getElementById("audio").play();
  document.getElementById("audio-img").src = img;
  document.getElementById("audio-description").innerText = desc;
  document.getElementById("audio-title").innerText = title;
}
