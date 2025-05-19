<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre message - TheEnd.Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        .envelope {
            font-size: 200px;
            cursor: pointer;
            animation: blink 1s infinite;
            text-align: center;
            margin: 20px auto;
            display: block;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .message-frame {
            display: none;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            filter: blur(2px);
            position: relative;
            top: -10px;
        }
        .message-frame.show {
            filter: none;
            background: rgba(255, 255, 255, 0.9);
        }
        .tone-info {
            font-style: italic;
            color: #555;
            margin-bottom: 10px;
        }
        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Votre message</h2>
        <div class="envelope" onclick="openEnvelope()">✉️</div>
        <div class="message-frame" id="messageFrame">
            <p class="tone-info" id="toneInfo"></p>
            <p id="messageContent"></p>
            <div class="buttons">
                <button onclick="editMessage()">Modifier</button>
                <button onclick="shareMessage()">Partager</button>
            </div>
        </div>
    </div>
    <audio id="sound" autoplay>
        <source src="" type="audio/mp3">
    </audio>
    <script>
        const message = sessionStorage.getItem('message');
        const sound = sessionStorage.getItem('sound');
        const emotion = sessionStorage.getItem('emotion');
        const tone = sessionStorage.getItem('tone');

        if (!message || !emotion || !tone) {
            alert("Erreur : données manquantes. Retour à la sélection.");
            window.location.href = 'demandeinfo.php';
        }

        document.getElementById('sound').src = `/sounds/${sound}.mp3`;
        document.getElementById('messageContent').textContent = message;
        document.getElementById('toneInfo').textContent = `Ton : ${tone}`;

        function openEnvelope() {
            document.querySelector('.envelope').style.display = 'none';
            const messageFrame = document.getElementById('messageFrame');
            messageFrame.style.display = 'block';
            messageFrame.classList.add('show');
        }

        function editMessage() {
            window.location.href = 'form.html';
        }

        function shareMessage() {
            const shareUrl = `${window.location.origin}/share?message=${encodeURIComponent(message)}&emotion=${encodeURIComponent(emotion)}&tone=${encodeURIComponent(tone)}`;
            const shareData = {
                title: 'Mon message - TheEnd.Page',
                text: `Découvrez mon message de départ avec le ton ${tone} !`,
                url: shareUrl
            };

            if (navigator.share) {
                navigator.share(shareData)
                    .then(() => console.log('Partage réussi'))
                    .catch((error) => {
                        console.error('Erreur de partage', error);
                        navigator.clipboard.writeText(shareUrl).then(() => {
                            alert("Lien copié dans le presse-papiers !");
                        });
                    });
            } else {
                navigator.clipboard.writeText(shareUrl).then(() => {
                    alert("Lien copié dans le presse-papiers !");
                });
            }
        }
    </script>
</body>
</html>