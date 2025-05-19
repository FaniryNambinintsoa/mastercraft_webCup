<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisissez votre situation et émotion - TheEnd.Page</title>
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
            background: rgba(14, 13, 13, 0.95);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(233, 229, 229, 0.2);
            max-width: 800px;
            text-align: center;
            position: relative;
        }

        h2 {
            font-size: 24px;
            color: #f5f5f5;
            margin-bottom: 20px;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
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

        .emoji-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            justify-items: center;
            margin-top: 20px;
        }

        .emoji-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .emoji {
            font-size: 36px;
            cursor: pointer;
            transition: transform 0.3s ease;
            position: relative;
            display: inline-block;
        }

        .emoji:hover {
            transform: scale(1.5);
        }

        .emotion-label {
            font-size: 12px;
            color: #333;
            margin-top: 5px;
            text-align: center;
            max-width: 100px;
            word-wrap: break-word;
        }

        .tooltip {
            position: absolute;
            background: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            z-index: 2;
        }

        .emoji:hover + .tooltip {
            opacity: 1;
        }

        /* Animations spécifiques pour chaque émotion */
        .excitation { animation: pulse 1.5s infinite; }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .joie { animation: bounce 2s infinite; }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .soulagement { animation: sway 3s infinite; }
        @keyframes sway {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(5deg); }
        }

        .espoir { animation: sparkle 2s infinite; }
        @keyframes sparkle {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.5); }
        }

        .fierte { animation: grow 2s infinite; }
        @keyframes grow {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.3); }
        }

        .gratitude { animation: heartBeat 1.8s infinite; }
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2); }
        }

        .determination { animation: shake 1.5s infinite; }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(5px); }
        }

        .tristesse {
            position: relative;
            animation: cry 2s infinite;
        }
        .tristesse::after {
            content: '💧';
            position: absolute;
            font-size: 20px;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            animation: tearDrop 2s infinite;
        }
        @keyframes tearDrop {
            0% { bottom: -20px; opacity: 1; }
            100% { bottom: -40px; opacity: 0; }
        }
        @keyframes cry {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(5px); }
        }

        .nostalgie { animation: fade 3s infinite; }
        @keyframes fade {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .peur { animation: tremble 0.2s infinite; }
        @keyframes tremble {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(2px); }
        }

        .stress { animation: vibrate 0.3s infinite; }
        @keyframes vibrate {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(2deg); }
            75% { transform: rotate(-2deg); }
        }

        .regret { animation: swaySlow 3s infinite; }
        @keyframes swaySlow {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(-5deg); }
        }

        .frustration { animation: pulseRed 1.5s infinite; }
        @keyframes pulseRed {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.3) hue-rotate(15deg); }
        }

        .solitude { animation: fadeSlow 4s infinite; }
        @keyframes fadeSlow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .melancolie { animation: drift 3s infinite; }
        @keyframes drift {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(10px); }
        }

        .inquietude-excitation { animation: pulseFast 1s infinite; }
        @keyframes pulseFast {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.15); }
        }

        .amertume { animation: darken 2s infinite; }
        @keyframes darken {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(0.8); }
        }

        .vide { animation: float 3s infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .confusion { animation: spin 2s infinite; }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .ironique { animation: wink 2s infinite; }
        @keyframes wink {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1) rotate(5deg); }
        }

        body {
      margin: 0;
      height: 100vh;
      background: linear-gradient(270deg, #ff6ec4, #7873f5, #4ef2e0, #fcd38a);
      background-size: 800% 800%;
      animation: gradientMove 15s ease infinite;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
      color: white;
      font-size: 2em;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    </style>
</head>
<body>
    <div class="container">
        <div id="situationSection">
            <h2>Quel est votre état de situation ?</h2>
            <select id="situation">
                <option value="">-- Choisir une catégorie --</option>
                <option value="professionnelle">Vie professionnelle</option>
                <option value="personnelle">Vie personnelle</option>
                <option value="etudes">Études et formations</option>
                <option value="engagements">Engagements et loisirs</option>
                <option value="autres">Autres circonstances</option>
            </select>
            <select id="sub-situation" style="display: none;">
                <option value="">-- Choisir une situation --</option>
            </select>
            <button onclick="showEmojis()">Continuer</button>
            <button onclick="goBackToIndex()">Retour</button>
        </div>

        <div id="emojisSection" style="display: none;">
            <h2>Quelle émotion souhaitez-vous exprimer ?</h2>
            <div class="emoji-grid" id="emojiGrid">
                <div class="emoji-container">
                    <div class="emoji excitation" data-emotion="Excitation" onclick="selectEmotion('Excitation')">🎉</div>
                    <div class="tooltip">Excitation</div>
                    <span class="emotion-label">Excitation</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji joie" data-emotion="Joie" onclick="selectEmotion('Joie')">😊</div>
                    <div class="tooltip">Joie</div>
                    <span class="emotion-label">Joie</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji soulagement" data-emotion="Soulagement" onclick="selectEmotion('Soulagement')">😌</div>
                    <div class="tooltip">Soulagement</div>
                    <span class="emotion-label">Soulagement</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji espoir" data-emotion="Espoir" onclick="selectEmotion('Espoir')">🌟</div>
                    <div class="tooltip">Espoir</div>
                    <span class="emotion-label">Espoir</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji fierte" data-emotion="Fierté" onclick="selectEmotion('Fierté')">🏆</div>
                    <div class="tooltip">Fierté</div>
                    <span class="emotion-label">Fierté</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji gratitude" data-emotion="Gratitude" onclick="selectEmotion('Gratitude')">🙏</div>
                    <div class="tooltip">Gratitude</div>
                    <span class="emotion-label">Gratitude</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji determination" data-emotion="Détermination" onclick="selectEmotion('Détermination')">💪</div>
                    <div class="tooltip">Détermination</div>
                    <span class="emotion-label">Détermination</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji tristesse" data-emotion="Tristesse" onclick="selectEmotion('Tristesse')">😢</div>
                    <div class="tooltip">Tristesse</div>
                    <span class="emotion-label">Tristesse</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji nostalgie" data-emotion="Nostalgie" onclick="selectEmotion('Nostalgie')">🕰️</div>
                    <div class="tooltip">Nostalgie</div>
                    <span class="emotion-label">Nostalgie</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji peur" data-emotion="Peur" onclick="selectEmotion('Peur')">😨</div>
                    <div class="tooltip">Peur</div>
                    <span class="emotion-label">Peur</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji stress" data-emotion="Stress" onclick="selectEmotion('Stress')">😓</div>
                    <div class="tooltip">Stress</div>
                    <span class="emotion-label">Stress</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji regret" data-emotion="Regret" onclick="selectEmotion('Regret')">😔</div>
                    <div class="tooltip">Regret</div>
                    <span class="emotion-label">Regret</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji frustration" data-emotion="Frustration" onclick="selectEmotion('Frustration')">😣</div>
                    <div class="tooltip">Frustration</div>
                    <span class="emotion-label">Frustration</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji solitude" data-emotion="Solitude" onclick="selectEmotion('Solitude')">🙍</div>
                    <div class="tooltip">Solitude</div>
                    <span class="emotion-label">Solitude</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji melancolie" data-emotion="Mélancolie" onclick="selectEmotion('Mélancolie')">🌧️</div>
                    <div class="tooltip">Mélancolie</div>
                    <span class="emotion-label">Mélancolie</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji inquietude-excitation" data-emotion="Inquiétude mêlée d'excitation" onclick="selectEmotion('Inquiétude mêlée d'excitation')">😬</div>
                    <div class="tooltip">Inquiétude mêlée d'excitation</div>
                    <span class="emotion-label">Inquiétude mêlée d'excitation</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji amertume" data-emotion="Amertume" onclick="selectEmotion('Amertume')">😣</div>
                    <div class="tooltip">Amertume</div>
                    <span class="emotion-label">Amertume</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji vide" data-emotion="Sentiment de vide" onclick="selectEmotion('Sentiment de vide')">🌀</div>
                    <div class="tooltip">Sentiment de vide</div>
                    <span class="emotion-label">Sentiment de vide</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji confusion" data-emotion="Confusion" onclick="selectEmotion('Confusion')">❓</div>
                    <div class="tooltip">Confusion</div>
                    <span class="emotion-label">Confusion</span>
                </div>
                <div class="emoji-container">
                    <div class="emoji ironique" data-emotion="Ironique" onclick="selectEmotion('Ironique')">😏</div>
                    <div class="tooltip">Ironique</div>
                    <span class="emotion-label">Ironique</span>
                </div>
            </div>
            <button id="hideEmojisButton" style="display: none;" onclick="hideEmojis()">Masquer les émotions</button>
        </div>
    </div>

    <script>
        const subOptions = {
            professionnelle: [
                "Démission", "Fin de contrat", "Licenciement",
                "Départ à la retraite", "Changement de carrière", "Abandon d'un projet"
            ],
            personnelle: [
                "Rupture amoureuse (séparation, divorce)", "Éloignement d'une amitié",
                "Départ d'un groupe ou d'une association", "Déménagement"
            ],
            etudes: [
                "Changement d'établissement", "Abandon d'un cursus", "Fin d'une formation"
            ],
            engagements: [
                "Arrêt d'un sport ou d'une activité artistique",
                "Désengagement d'un club ou d'une organisation", "Fin d'un projet créatif"
            ],
            autres: [
                "Raisons médicales ou familiales", "Exil ou migration",
                "Changement de vie spirituelle ou religieuse"
            ]
        };

        function showSubOptions() {
            const situation = document.getElementById('situation').value;
            const subSituation = document.getElementById('sub-situation');
            subSituation.innerHTML = '<option value="">-- Choisir une situation --</option>';

            if (situation && subOptions[situation]) {
                subOptions[situation].forEach(option => {
                    const opt = document.createElement('option');
                    opt.value = option;
                    opt.textContent = option;
                    subSituation.appendChild(opt);
                });
                subSituation.style.display = 'block';
            } else {
                subSituation.style.display = 'none';
            }
        }

        function showEmojis() {
            const situation = document.getElementById('situation').value;
            const subSituation = document.getElementById('sub-situation').value;
            if (situation && subSituation) {
                sessionStorage.setItem('situation', situation);
                sessionStorage.setItem('subSituation', subSituation);
                document.getElementById('emojisSection').style.display = 'block';
                document.getElementById('hideEmojisButton').style.display = 'inline-block';
            } else {
                alert("Veuillez sélectionner une catégorie et une situation.");
            }
        }

        function hideEmojis() {
            document.getElementById('emojisSection').style.display = 'none';
            document.getElementById('hideEmojisButton').style.display = 'none';
        }

        function selectEmotion(emotion) {
            sessionStorage.setItem('emotion', emotion);
            window.location.href = 'message.php';
        }

        function goBackToIndex() {
            window.location.href = 'index.html';
        }

        document.getElementById('situation').addEventListener('change', showSubOptions);

        const emojis = document.querySelectorAll('.emoji');
        emojis.forEach(emoji => {
            emoji.addEventListener('mousemove', (e) => {
                const tooltip = emoji.nextElementSibling;
                tooltip.style.left = `${e.clientX - emoji.offsetLeft + 10}px`;
                tooltip.style.top = `${e.clientY - emoji.offsetTop - 30}px`;
            });
        });
    </script>
</body>
</html>