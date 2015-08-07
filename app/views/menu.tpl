<div class="navbar navbar-material-brown">
    <div class="navbar-header">
        {if isset($session.pseudo)}
        <button type="button" class="navbar-toggle">
            Déconnexion <i class="mdi-maps-directions-walk mdi-right"></i>
        </button>
        {/if}
        <a class="navbar-brand" href="accueil">
            <i class="mdi-maps-directions-bike"></i>
        </a>
        {if isset($session.pseudo)}
        <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="ajouter-categories" title="Ajouter une catégorie">
            <i class="mdi-content-add mdi-mobile"></i>
        </a> 
        <a class="navbar-brand hidden-sm hidden-md hidden-lg" href="ajouter-souscategories" title="Ajouter une sous-catégorie">
            <i class="mdi-av-playlist-add mdi-mobile"></i>
        </a>
        {/if}
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="accueil" title="Revenir à l'accueil">
                    Accueil
                </a>
            </li>
            {if isset($session.pseudo)}
            <li>
                <a href="ajouter-categories" title="Ajouter une catégorie">
                    <i class="mdi-content-add mdi-left"></i> Ajouter une catégorie
                </a>
            </li>
            <li>
                <a href="ajouter-souscategories" title="Ajouter une sous-catégorie">
                    <i class="mdi-av-playlist-add mdi-left"></i> Ajouter une sous-catégorie
                </a>
            </li>
            {/if}
        </ul>
        {if isset($session.pseudo)}
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="deconnexion">
                    Déconnexion <i class="mdi-maps-directions-walk mdi-right"></i>
                </a>
            </li>
        </ul>
        {/if}
    </div>
</div>