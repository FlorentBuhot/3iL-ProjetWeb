<?php
    require_once("../template/inc_head.php");
    require_once("../template/inc_header.php");

    require_once("../template/inc_connectionBase.php");

    //Requete pour récupérer tout les joueurs
    $texteReq = "select * ";
    $texteReq .= "from matchs";
    // $texteReq .= "where match";

    //demander la creation de la requete à l'instance PDO ($cnx)
    $requete = $cnx->prepare($texteReq);

    //Execution de la requête
    $requete->execute();
    $tabmatch = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<br/><br/>

    <div class="accordion" id="accordionJoueur">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingJoueur">
                <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJoueur" aria-expanded="true" aria-controls="collapseJoueur">
                    <img src="/ressource/image/fleche_verte.png" alt="Logo" width="50" height="50"
                         class="d-inline-block align-text-top fw-bold">Mes matchs en tant que joueur
                </button>
            </h2>
            <div id="collapseJoueur" class="accordion-collapse collapse show" aria-labelledby="headingJoueur" data-bs-parent="#accordionJoueur">
                <div class="accordion-body">
                    <h4> Les matchs que je joue</h4>
                    <p>tableau</p>
                </div>
            </div>
        </div>