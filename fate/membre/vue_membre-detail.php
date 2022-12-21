<div id="boite-membre">
    <div class="mb-4 text-white" id="membre-pseudonyme">
        <label class="col-label text-white h5 mt-4 me-2">Pseudonyme:</label>
        <span>     <?=$membre['pseudonyme']?></span>
    </div>

    <div class="mb-4 text-white" id="membre-courriel">
        <label class="col-label text-white h5 me-2">Courriel: </label>
        <span>     <?=$membre['courriel']?></span>
    </div>

    <div class="mb-4 text-white" id="membre-prenom">
        <label class="col-label text-white h5 me-2" >Prenom: </label>
        <span>     <?=$membre['prenom']?></span>
    </div>

    <div class="mb-4 text-white" id="membre-nom">
        <label class="col-label text-white h5 me-2">Nom: </label>
        <span>     <?=$membre['nom']?></span>
    </div>

    <div class="mb-4 text-white" id="membre-avatar">
        <img src="images/<?=$membre['avatar']?>" alt="" width="300">
    </div>
</div>
