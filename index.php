<?php
session_start();
$verifLog = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="fr">
 
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TheEnd.Page</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet"
  >
  <style>
     {
    scroll-behavior: smooth;
  }
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #0d0d0d;
      color: #ffffff;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
    }

    .logo {
      font-weight: bold;
      font-size: 20px;
    }

    nav a {
      color: #fff;
      margin-left: 20px;
      text-decoration: none;
      font-size: 14px;
    }

    .hero {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: flex-start;
      height: 90vh;
      padding: 0 10%;
      background: radial-gradient(ellipse at bottom, #1a1a1a 0%, #0d0d0d 100%);
      position: relative;
      overflow: hidden;
      z-index: 2;
    }

    .hero h1 {
      font-size: 48px;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 18px;
      max-width: 500px;
      line-height: 1.6;
    }

    .hero button {
      margin-top: 20px;
      padding: 6px 12px;
      background-color: #ff4c4c;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .hero button:hover {
      background-color: #e83e3e;
    }

    .dots {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 200px;
      background: radial-gradient(white 1px, transparent 0);
      background-size: 20px 20px;
      opacity: 0.05;
    }

    .background-video {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 0;
      opacity: 0.3;
      pointer-events: none;
    }

    .example-list {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.example-card {
  width: 220px;
  height: 300px;
  border-radius: 15px;
  padding: 20px;
  color: #fff;
  overflow: hidden;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  transition: transform 0.3s, box-shadow 0.3s;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  font-family: 'Segoe UI', sans-serif;
  cursor: pointer;
}
.example-card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 20px rgba(0,0,0,0.3);
}
.example-card h3 {
  margin: 0 0 10px 0;
  font-size: 20px;
}
.example-card p {
  margin: 0;
  font-size: 14px;
}

.animated-emoji {
  font-size: 30px;
  margin-top: 10px;
  animation: bounce 2s infinite alternate;
}

@keyframes bounce {
  0% {
    transform: translateY(0);
  }
  100% {
    transform: translateY(-10px);
  }
}
/* Animation fade-in-up */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.section-title {
  text-align: center;
  margin: 50px 0 20px 0;
  font-size: 28px;
  font-weight: bold;
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}

.animate-fadeInUp {
  opacity: 1;
  transform: translateY(0);
}

/* Animations pour les cartes et emojis (inchangées) */
.animated-emoji {
  font-size: 30px;
  margin-top: 10px;
  animation: bounce 2s infinite alternate;
}
@keyframes bounce {
  0% { transform: translateY(0); }
  100% { transform: translateY(-10px); }
}

/* Container en haut à gauche, centré verticalement */
.animation-container {
  position: absolute;
  top: 50%;
  left: 20px;
  transform: translateY(-50%);
  max-width: 90%;
  z-index: 10;
  padding: 20px;
  border-radius: 8px;
}

/* Ajoute une marge à ton titre et ton paragraphe pour un bon espacement */
.animation-container h1,
.animation-container p,
.animation-container button {
  margin: 0 0 15px 0;
}

/* Optionnel : pour ton bouton pour plus de style si nécessaire */
.animation-container button {
  cursor: pointer;
  font-size: 14px;
  padding: 8px 16px;
  background-color: #ff4c4c;
  border: none;
  border-radius: 4px;
  transition: background 0.3s ease;
}

.animation-container button:hover {
  background-color: #e83e3e;
}



/* Animation de base (pour cause de simplicité, vous pouvez l’étendre ou la personnaliser) */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Appliquer animations aux classes */
.animate {
  opacity: 0; /* Commence invisible, puis s'anime */
  animation-duration: 1s;
  animation-fill-mode: forwards; /* Maintient l’état final de l’animation */
}

/* Animation spécifiques avec delay pour un effet en cascade */
.fade-in-down {
  animation-name: fadeInDown;
  animation-delay: 0.2s; /* léger délai pour le titre */
}

.fade-in-up {
  animation-name: fadeInUp;
  animation-delay: 0.4s; /* délai un peu plus long pour le paragraphe */
}

.fade-in {
  animation-name: fadeIn;
  animation-delay: 0.6s; /* délai même pour le bouton pour uniformiser */
}

/* Animation pulse */
@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.05);
  }
  100% {
    transform: scale(1);
  }
}

.animate-pulse {
  animation: pulse 2s infinite;
}

footer {
            background: linear-gradient(to right, #00b09b, #96c93d);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .contact-info {
            display: flex;
            flex-direction: column;
        }
        .contact-info p {
            margin: 0;
        }
        .newsletter {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }
        .newsletter input[type="email"] {
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        .newsletter button {
            padding: 10px 20px;
            background-color: #ff4f5e;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }
        .footer-links {
            display: flex;
            gap: 20px;
        }


        /* Blur de la page lorsqu’on ouvre le modal */
    body.modal-open .main-content {
      filter: blur(5px);
      transition: filter 0.3s;
    }

    /* Overlay plus sombre */
    .modal-backdrop.show {
      background-color: rgba(0, 0, 0, 0.8); /* intensité sombre */
    }

    /* Fond du contenu du modal plus foncé */
    .modal-content {
      background-color: #2c2c2c;  /* gris très foncé */
      color: #f1f1f1;             /* texte clair */
      border: none;
    }

    /* Bouton de fermeture blanc */
    .modal-header .btn-close {
      filter: invert(1);
    }

    /* Champs de formulaire sombres */
    .modal-content .form-control {
      background-color: #444;
      border: 1px solid #555;
      color: #eee;
    }
    .modal-content .form-control::placeholder {
      color: #bbb;
    }
  </style>
</head>


  <!-- Contenu principal
  <div class="main-content">
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Mon Site</span>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
          Se connecter
        </button>
      </div>
    </nav>

    <div class="container mt-5">
      <h1>Bienvenue !</h1>
      <p>Voici le contenu principal de la page.</p>
    </div>
  </div> -->



  

  <header>
    <div class="logo">TheEnd.Page</div>
    <nav>
    <button class="btn btn-light w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
          Se connecter
        </button>
    </nav>
  </header>

  <section class="hero">
    <video autoplay muted loop playsinline class="background-video">
      <source src="Video/Index.mp4" type="video/mp4" />
      Votre navigateur ne supporte pas la vidéo HTML5.
    </video>

    <!-- Contenu placé dans la section hero -->
<div class="animation-container">
  <h1 class="animate fade-in-down">Créez votre page de départ personnalisée</h1>
  <p class="animate fade-in-up">Quittez la scène avec panache : créez une page unique, sincère et inoubliable pour marquer la fin… à votre façon.</p>



  <?php if ($verifLog): ?>
      <!-- Bouton actif -->
      <button class="animate fade-in" onclick="window.location.href='Theme.html'">Démarrer</button>
    <?php else: ?>
      <!-- Bouton qui redirige vers le login -->
      <button 
        class="animate fade-in"
        data-bs-toggle="modal"
        data-bs-target="#loginModal">
        Démarrer
      </button>
      
    <?php endif; ?>

1
</div>
    </div>
    <div class="dots"></div>
  </section>
  <div class="animated-section">
  <div class="example-list">

    
    <!-- Exemple 1: Fin d'études émouvante -->
    <div class="example-card" style="background: linear-gradient(135deg, #667eea, #764ba2);">
      <h3>Fin d'études émouvante</h3>
      <p>Une page sincère pour remercier ses professeurs et amis, pleine de nostalgie.</p>
      <!-- Emoji animé -->
      <div class="emoji animated-emoji">🎓</div>
    </div>
    
    <!-- Exemple 2: Adieu à une promotion -->
    <div class="example-card" style="background: linear-gradient(135deg, #f7971e, #ffd200);">
      <h3> Adieu à une promotion</h3>
      <p>Un message de reconnaissance pour ses collègues lors de cette étape importante.</p>
      <div class="emoji animated-emoji">🤝</div>
    </div>
    
    <!-- Exemple 3: Départ plein d'humour -->
    <div class="example-card" style="background: linear-gradient(135deg, #00c3ff, #ffff1c);">
      <h3> Départ plein d'humour</h3>
      <p>Une page légère, pleine de blagues et GIFs pour faire rire tout le monde.</p>
      <div class="emoji animated-emoji">😂</div>
    </div>
    
    <!-- Exemple 4: Fin d'aventure professionnelle -->
    <div class="example-card" style="background: linear-gradient(135deg, #ff6f61, #d72631);">
      <h3> Fin d'aventure professionnelle</h3>
      <p>Pour marquer la fin d'une étape dans votre carrière avec style et gratitude.</p>
      <div class="emoji animated-emoji">🚀</div>
    </div>
  </div>
</div>

  <h2 class="section-title" id="exempleTitre">Exemple de message</h2>

  <script>
    // Sélectionne le titre
    const titreExemple = document.getElementById('exempleTitre');
  
    // Fonction pour vérifier si l'élément est dans la vue
    function isInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.bottom >= 0
      );
    }
  
    // Écoute le scroll
    window.addEventListener('scroll', () => {
      if (isInViewport(titreExemple)) {
        titreExemple.classList.add('animate-fadeInUp');
      }
    });
  </script>
  
   <!-- Modal Connexion -->
   <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Connexion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="loginForm">
            <div class="mb-3">
              <label for="loginEmail" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="loginEmail" placeholder="vous@example.com">
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="loginPassword" placeholder="••••••">
            </div>
            <button type="submit" class="btn btn-light w-100">Se connecter</button>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <small>Pas encore de compte ? 
            <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signupModal">
              S’inscrire
            </a>
          </small>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Inscription -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Inscription</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="signupForm">
            <div class="mb-3">
              <label for="signupName" class="form-label">Nom complet</label>
              <input type="text" class="form-control" id="signupName" placeholder="Votre nom">
            </div>
            <div class="mb-3">
              <label for="signupEmail" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="signupEmail" placeholder="vous@example.com">
            </div>
            <div class="mb-3">
              <label for="signupPassword" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="signupPassword" placeholder="••••••">
            </div>
            <div class="mb-3">
              <label for="signupConfirm" class="form-label">Confirmer mot de passe</label>
              <input type="password" class="form-control" id="signupConfirm" placeholder="••••••">
            </div>

            <fieldset class="mb-3">
              <legend class="col-form-label">Votre genre</legend>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="signupChoice" id="choice1" value="1" checked>
            <label class="form-check-label" for="choice1">Homme</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="signupChoice" id="choice2" value="2">
            <label class="form-check-label" for="choice2">Femme</label>
            </div>
            </fieldset>
            <div class="custom-checkbox mb-3">
                <input type="checkbox" class="form-check-input me-2" required>
                <label class="form-check-label">J'accepte les conditions d'utilisation de mes données *</label>
            </div>
            <button type="submit" class="btn btn-light w-100">S’inscrire</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  ></script>
<footer>
  <div class="contact-info">
      <p>01 23 45 67 89</p>
      <p>info@monsite.fr</p>
      <p>47 rue des Couronnes</p>
      <p>75020 Paris, France</p>
  </div>
  
  <div class="newsletter">
      <p>S'abonner à notre newsletter</p>
      <input type="email" placeholder="E-mail *" required>
      <button>Envoyer</button>
  </div>
</footer>
</body>
</html>
