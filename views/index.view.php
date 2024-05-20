<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadriciel PWA</title>
    <style>
        body{background:radial-gradient(farthest-side at bottom left,rgba(255, 0, 255, 0.5), transparent),radial-gradient(farthest-corner at bottom right,rgba(255, 50, 50, 0.5),       transparent 400px);}.github:hover span,.grille li:hover{color:#eee}.st2,html{font-family:sans-serif}.grille li:hover .nombre{background-color:#ccc;box-shadow:initial;border:3px solid #333}.grille li,main{min-height:100%;display:flex}.grille .nombre,body{color:#333;background-color:#eee}.github:hover,.grille li:hover{background-color:#333}html{box-sizing:border-box;line-height:1.5}*,::after,::before{margin:0;padding:0;box-sizing:inherit}body{height:100vh}main{padding-top:3em;flex-direction:column;justify-content:center;align-items:center}main>section{padding:2rem}h1{font-size:2.5rem;text-transform:uppercase;border:5px solid #333;padding:.5em 1em}h2{font-size:1rem;text-align:center}ul{list-style:none}.grille{display:grid;grid-template-columns:1fr;gap:3rem;margin-top:2.5rem;padding:0 5em}.grille li{background-color:#eee;box-shadow:4px 4px 10px #ccc;padding:1.5em 1em;align-items:flex-start;justify-content:center;max-width:350px;position:relative;transition:.1s}.grille code{background-color:#777;color:#eee;padding:.25em .5em;display:inline;font-weight:700}.grille p~p{margin-top:1rem}.grille .nombre{position:absolute;top:-15px;left:-10px;padding:.5em;width:100px;height:40px;margin:0;border:1px solid #ccc;box-shadow:2px 2px 5px #ccc;line-height:1;display:flex;justify-content:center;align-items:center;font-weight:bolder;transition:.1s}.st0{fill:none;stroke:#333333;stroke-width:5;stroke-miterlimit:10}.st1{fill:#333333}.st3{font-size:48.4171px;font-weight:700}.logo{width:50%}.github{padding:.5em 1em;position:absolute;top:10px;right:5px}.github a{display:flex;align-items:center;text-decoration:none}.github svg{width:35px;height:35px;fill:#333}.github span{margin-left:5px;display:none;color:#333}.github:hover svg{fill:#eee}@media screen and (min-width:768px){.grille{grid-template-columns:repeat(2,1fr);grid-template-rows:repeat(2,1fr);gap:3rem}h2{font-size:1.5rem}.github{right:0}.github span{display:inline}}@media screen and (min-width:1300px){.grille{grid-template-columns:1fr 1fr 1fr 1fr;grid-template-rows:1fr}.logo{width:35%}}
    </style>
</head>

<body>
    <main>
        <div class="github">
            <a href="https://github.com/eriga/PWA_cadriciel" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                <span>Github</span>
            </a>
        </div>
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.02 109.94" style="enable-background:new 0 0 409.02 109.94;" xml:space="preserve" class="logo">
            <rect x="2.5" y="2.5" class="st0" width="404.02" height="104.94" />
            <text transform="matrix(0.8303 0 0 1 45.7909 70.5483)" class="st1 st2 st3">CADRICIEL PWA</text>
        </svg>
        <section>
            <h2>Comment utiliser ce cadriciel:</h2>
            <ul class="grille">
                <li>
                    <div>
                        <p class="nombre">1</p>
                        <p>
                            Effacez la vue <code>views/index.view.php</code>
                        </p>
                        <p>
                            Changez les paramètres de connexion à la BDD dans le fichier <code>.env</code>
                        </p>
                    </div>
                </li>
                <li>
                    <div>
                        <p class="nombre">2</p>
                        <p>
                            Effacez la route présente par défaut.
                        </p>
                        <p>
                            Ajoutez les routes du projet dans le fichier <code>routes/web.php</code>: vous devrez associer une route à un tableau contenant le controller et la méthode
                        </p>
                        <p>
                            Ex., <code>"index" => ["SiteController", "index"]</code>
                        </p>
                    </div>
                </li>
                <li>
                    <div>
                        <p class="nombre">3</p>
                        <p>
                            Ajoutez les contrôleurs nécessaires dans le dossier <code>/controllers</code>
                        </p>
                        <p>
                            Effacez le contrôleur <code>DefautController</code>
                        </p>
                        <p>
                            Chaque controller doit appartenir au <em>namespace</em> <code>Controller</code> et hérité de <code>Base\Controller</code>
                        </p>
                    </div>
                </li>
                <li>
                    <div>
                        <p class="nombre">4</p>
                        <p>
                            Ajoutez les modèles nécessaires au projet.
                        </p>
                        <p>
                            Chaque modèle doit appartenir au <em>namespace</em> <code>Model</code> et hérité de <code>Base\Model</code>
                        </p>
                        <p>
                        Chaque modèle doit préciser sa table associée avec la propriété <code>protected $table = "nom_table";</code>
                        </p>
                    </div>
                </li>
            </ul>
        </section>
    </main>
</body>

</html>