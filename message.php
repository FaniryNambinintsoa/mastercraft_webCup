<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Écrivez votre message - TheEnd.Page</title>
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
            max-width: 1000px;
            width: 90%;
            text-align: center;
            display: flex;
            flex-direction: row;
            gap: 20px;
        }
        .tone-select {
            flex: 1;
            text-align: left;
            padding-right: 20px;
        }
        .tone-select h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 15px;
        }
        .tone-select select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .tone-gif {
            display: none;
            margin-top: 10px;
        }
        .tone-gif img {
            width: 200px;
            height: 200px;
            border: none;
        }
        .tone-gif.show {
            display: block;
        }
        .form-section {
            flex: 2;
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            resize: vertical;
        }
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
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
            margin: 10px;
        }
        button:hover {
            background: #45a049;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .tone-select {
                text-align: center;
                padding-right: 0;
                margin-bottom: 20px;
            }
            .tone-gif {
                text-align: center;
            }
            .form-section {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container" id="themeContainer">
        <div class="tone-select">
            <h3>🎭 Choisissez votre ton :</h3>
            <select id="toneSelect" onchange="selectTone(this.value)">
                <option value="">-- Choisir un ton --</option>
                <option value="Dramatique">🖤 Dramatique</option>
                <option value="Ironique">🤡 Ironique</option>
                <option value="Classe">🎩 Classe</option>
                <option value="Cringe">🫠 Cringe</option>
                <option value="Touchant">😢 Touchant</option>
                <option value="Colère">😣 Colère</option>
                <option value="Fatigue">😫 Fatigue</option>
                <option value="Honnête">🤝 Honnête</option>
                <option value="Brisé">💔 Brisé</option>
                <option value="Heureux">😊 Heureux</option>
                <option value="Regret">😔 Regret</option>
            </select>
            <div class="tone-gif" id="toneGif">
                <img id="gifImage" src="" alt="GIF du ton">
            </div>
        </div>
        <div class="form-section">
            <h2>Votre message</h2>
            <textarea id="message" placeholder="Exprimez-vous..."></textarea>
            <h2>Choisissez un son</h2>
            <select id="toneSound" onchange="selectSound(this.value)">
                <option value="">-- Choisir un son --</option>
                <option value="Dramatique">Son 1</option>
                <option value="Ironique">Son 2</option>
                <option value="Classe">Son 3</option>
                <option value="Cringe">Son 4</option>
                <option value="Touchant">Son 5</option>
                <option value="Colère">Son 6</option>
                <option value="Fatigue">Son 7</option>
                <option value="Honnête">Son 8</option>
                <option value="Brisé">Son 9</option>
                <option value="Heureux">Son 10</option>
                <option value="Regret">Son 11</option>
            </select>
            <button onclick="submitMessage()">Envoyer</button>
            <button onclick="goBack()">Retour</button>
        </div>
    </div>
    <audio id="toneSoundAudio"></audio>
    <script>
        const themes = {
            "Excitation": "#FF4500",
            "Joie": "#FFD700",
            "Tristesse": "#4682B4",
            "Soulagement": "#98FB98",
            "Espoir": "#FFDAB9",
            "Fierté": "#DAA520",
            "Gratitude": "#FFB6C1",
            "Détermination": "#228B22",
            "Nostalgie": "#6B8E23",
            "Peur": "#4B0082",
            "Stress": "#FF6347",
            "Regret": "#4682B4",
            "Frustration": "#DC143C",
            "Solitude": "#2F4F4F",
            "Mélancolie": "#5F9EA0",
            "Inquiétude mêlée d'excitation": "#FFA500",
            "Amertume": "#8B4513",
            "Sentiment de vide": "#696969",
            "Confusion": "#6A5ACD",
            "Ironique": "#9B59B6"
        };
        const toneGifs = {
            "Dramatique": "https://media.giphy.com/media/8YutMatqkTfSE/giphy.gif",
            "Ironique": "https://media.giphy.com/media/l3q2K5jinAlChoCLS/giphy.gif",
            "Classe": "https://media.giphy.com/media/3ohs4BSacFKI7A717y/giphy.gif",
            "Cringe": "https://media.giphy.com/media/TkDX9bkIROf8/giphy.gif",
            "Touchant": "https://media.giphy.com/media/JQqP5wTF0rH4Q/giphy.gif",
            "Colère": "https://media.giphy.com/media/3o7aD2X9b7b6YARnDG/giphy.gif",
            "Fatigue": "https://media.giphy.com/media/3o7TKtnuHOH2x3g9Z6/giphy.gif",
            "Honnête": "https://media.giphy.com/media/26FPy3QZQqGtDcxWC/giphy.gif",
            "Brisé": "https://media.giphy.com/media/3o7TKsQ8kEkW5v5Wko/giphy.gif",
            "Heureux": "https://media.giphy.com/media/3o7TKwmnDg81b6fS4o/giphy.gif",
            "Regret": "https://media.giphy.com/media/3o7TKsQ8kEkW5v5Wko/giphy.gif"
        };
        const toneAudios = {
            "Dramatique": "/sounds/dramatique.mp3",
            "Ironique": "/sounds/ironique.mp3",
            "Classe": "/sounds/classe.mp3",
            "Cringe": "/sounds/cringe.mp3",
            "Touchant": "/sounds/touchant.mp3",
            "Colère": "/sounds/colere.mp3",
            "Fatigue": "/sounds/fatigue.mp3",
            "Honnête": "/sounds/honnete.mp3",
            "Brisé": "/sounds/brise.mp3",
            "Heureux": "/sounds/heureux.mp3",
            "Regret": "/sounds/regret.mp3"
        };
        const emotion = sessionStorage.getItem('emotion');
        if (!emotion) {
            alert("Erreur : aucune émotion sélectionnée. Retour à la sélection.");
            window.location.href = 'demandeinfo.php';
        }
        document.getElementById('themeContainer').style.backgroundColor = themes[emotion] || "#FFFFFF";
 
        function selectTone(tone) {
            sessionStorage.setItem('tone', tone);
            const toneGif = document.getElementById('toneGif');
            const gifImage = document.getElementById('gifImage');
            if (tone && toneGifs[tone]) {
                gifImage.src = toneGifs[tone];
                gifImage.alt = `GIF pour ${tone}`;
                toneGif.classList.add('show');
            } else {
                toneGif.classList.remove('show');
            }
        }
 
        function selectSound(sound) {
            sessionStorage.setItem('toneSound', sound);
            const toneSoundAudio = document.getElementById('toneSoundAudio');
            if (sound && toneAudios[sound]) {
                toneSoundAudio.src = toneAudios[sound];
                toneSoundAudio.play().catch(error => {
                    console.error("Erreur de lecture audio :", error);
                });
            } else {
                toneSoundAudio.pause();
                toneSoundAudio.src = "";
            }
        }
 
        function submitMessage() {
            const message = document.getElementById('message').value;
            const tone = sessionStorage.getItem('tone');
            const toneSound = sessionStorage.getItem('toneSound');
            if (message && tone && toneSound) {
                sessionStorage.setItem('message', message);
                window.location.href = 'partage.php';
            } else {
                alert("Veuillez écrire un message, sélectionner un ton et un son.");
            }
        }
 
        function goBack() {
            window.location.href = 'demandeinfo.php';
        }
    </script>
</body>
</html>
 