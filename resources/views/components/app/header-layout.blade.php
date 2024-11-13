<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <x-app.social-medias/>
                <x-app.check-auth/>
            </div>
        </div>
    </div>
    <x-app.header-distance/>
    <div class="container main-menu" id="main-menu">
        <div class="row align-items-center justify-content-between">
            <nav id="nav-menu-container">
                <ul class="nav-menu">

                    <x-app.categories :categories="$categories"/>
                </ul>
            </nav>
            <x-app.header/>
        </div>
    </div>
</header>
