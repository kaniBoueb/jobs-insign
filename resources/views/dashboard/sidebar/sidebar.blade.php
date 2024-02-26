<div class="sidebar">
    <ul>
        <li>
            <div class="side">
                <i class="bi bi-back"></i>
                <a href="#" data-href="{{ route('home') }}">Les candidatures</a>
            </div>
        </li>

        <li>
            <div class="side">
                <i class="bi bi-view-list"></i>
                <a href="#" data-href="{{ route('offre.index') }}">Les offres</a>
            </div>
        </li>

        <li>
            <div class="side">
                <i class="bi bi-file-earmark-fill"></i>
                <a href="#" data-href="#">Candidatures</a>
            </div>
        </li>
        <hr>
        <li>
            <div class="side">
                <i class="bi bi-person-fill"></i>
                <a href="#" data-href="#">Mon compte</a>
            </div>
        </li>
    </ul>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var sidebar = document.querySelector('.sidebar');
        
        sidebar.addEventListener('click', function(event) {
            if (event.target.tagName === 'A') {
                event.preventDefault(); // Empêcher le rechargement de la page

                var url = event.target.getAttribute('data-href'); // Obtenir l'URL depuis l'attribut data-href
                if (url) {
                    window.location.href = url; // Redirection vers l'URL désirée
                }
            }
        });

        var sidebarItems = document.querySelectorAll('.sidebar li');

        sidebarItems.forEach(function(item) {
            item.addEventListener('click', function() {
                // Supprimer la classe active de tous les éléments de la sidebar
                sidebarItems.forEach(function(item) {
                    item.classList.remove('active');
                });

                // Ajouter la classe active à l'élément cliqué
                this.classList.add('active');
            });
        });
    });


</script>