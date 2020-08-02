<a class="menu-item" href="?page=home">Ray2Mod</a>
<a class="menu-item" href="?page=modmanager">Mod Manager</a>
<a class="menu-item" href="?page=api">API</a>
<a class="menu-item" href="?page=mods">Mods</a>
<a class="menu-item" href="?page=legacyfunbox">Funbox (legacy)</a>

<script>

    var items = document.getElementsByClassName("menu-item");
    for (var i = 0; i < items.length; i++) {
        if (window.location.href.indexOf(items[i].href)!==-1) {
            items[i].classList.add("active");
        }
    }
</script>
