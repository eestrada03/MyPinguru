<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyPinguru - Meditación</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <div class="audioscontainer">
        <div class="mainaudio">
            <img id="audio-img" src="assets/img/smartphone/meditacion01.png">
            <audio id="audio" controls>
                <source src="assets/audios/olas.mp3" type="audio/mpeg">
            </audio>
            <div class="maintext">
                <h2 id="audio-title">Cómo empezar</h2>
                <p id="audio-description">¿Qué es la meditación? Aprender los conceptos básicos es el comienzo hacia una mente más calmada y clara. La técnica guiada de este episodio se centra en la respiración.</p>

            </div>
        </div>
        <div class="audioslist">
            <div class="rowaudio">
                <img class="audio-item" src="assets/img/smartphone/meditacion01.png" onclick="cambiarAudio('assets/audios/olas.mp3','assets/img/smartphone/meditacion01.png','Cómo empezar','¿Qué es la meditación? Aprender los conceptos básicos es el comienzo hacia una mente más calmada y clara. La técnica guiada de este episodio se centra en la respiración.')">
                <div class="minidesc">
                    <h2 id="audio-title">Cómo empezar</h2>
                    <p id="itemdesc">Guía para la meditación</p>
                </div>
            </div>
            

            <div class="rowaudio">
                <img class="audio-item" src="assets/img/smartphone/meditacion02.png" onclick="cambiarAudio('assets/audios/olas.mp3', 'assets/img/smartphone/meditacion02.png','Cómo asumir el control','Esta sencilla meditación guiada ofrece un enfoque relajado de la visualización: un método para soltar lastre y dejar atrás la rabia, la frustración y la nostalgia.')">
                <div class="minidesc">
                    <h2 id="audio-title">Cómo asumir el control</h2>
                    <p id="itemdesc">Guía para la meditación</p>
                </div>
            </div>
            

            <div class="rowaudio">
                <img class="audio-item" src="assets/img/smartphone/meditacion03.png" onclick="cambiarAudio('assets/audios/olas.mp3', 'assets/img/smartphone/meditacion03.png','Cómo manejar el estrés','Sentirse abrumado puede empezar desde dentro. La sencilla pero potente técnica de la observación sirve para cambiar la relación con la ansiedad y tolerar mejor el estrés.')">
                <div class="minidesc">
                    <h2 id="audio-title">Cómo manejar el estrés</h2>
                    <p id="itemdesc">Guía para la meditación</p>
                </div>
            </div>
            <div class="rowaudio">
                <img class="audio-item" src="assets/img/smartphone/meditacion04.png" onclick="cambiarAudio('assets/audios/olas.mp3', 'assets/img/smartphone/meditacion04.png','Cómo gestionar el dolor','¿Cómo sentimos el dolor? Es posible estar presente sin sentir un sufrimiento que parece insoportable: la técnica del escáner corporal une el cuerpo y la mente.')">
                <div class="minidesc">
                    <h2 id="audio-title">Cómo gestionar el dolor</h2>
                    <p id="itemdesc">Guía para la meditación</p>
                </div>
            </div>
        </div>  
    </div>
	<script src="js/audio.js"></script>
</body>
</html>
