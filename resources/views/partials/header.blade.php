<header>
    @if (isset($slimHeader) && $slimHeader == true)
    
    @else
        <div class="flex flex-row">
            <div>
                <a href="/">Acceuil</a>
            </div>
            @if (Auth::user()->role == "superadmin")
                <div>
                    <a href="/users">Liste des utilisateurs</a>
                </div>
                <div>
                    <a href="/products">Liste de produit</a>
                </div>
                <div>
                    <a href="/products/category">Liste de Categorie</a>
                </div>
            @endif
        </div>
    @endif
</header>
