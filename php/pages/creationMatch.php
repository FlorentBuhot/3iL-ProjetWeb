<?php
require_once("../template/inc_head.php");
require_once("../template/inc_header.php");
?>
<script src="/js/date.js" defer></script>
<script src="/js/heure.js" defer></script>
<div class="container">

    <h1 class="mt-5">Création d'un match</h1>

    <form>
        <div class="input-group input-group-lg mt-3">
            <span class="input-group-text" id="inputGroup-sizing-lg">Nom du match :</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg" required>
        </div>
        <br/>
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg">Description du match :</span>
            <input type="text" class="form-control" aria-label="Sizing example input"
                   aria-describedby="inputGroup-sizing-lg">
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Détail du match</h2>

                <div>
                    <br/>
                    <label for="start">Date de début :</label>
                    <input type="date" class="form-control" id="start-match" name="match-start"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>

                <div>
                    <br/>
                    <label for="start-time">Heure de début :</label>
                    <input type="time" class="form-control" id="start-time-match" name="match-start-time"
                           aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                </div>
            </div>
            <div class="col-md-6">
                <h2>Les équipes</h2>

                <div>
                    <br/>
                    <label for="start">Équipe 1 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez une équipe</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

                <div>
                    <br/>
                    <label for="start">Équipe 2 :</label>
                    <select class="form-select" aria-label="Default select">
                        <option selected>Choisissez une équipe</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success mt-4">Créer le match</button>
    </form>
</div>
