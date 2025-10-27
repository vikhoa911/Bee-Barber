<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span></span>
            <img src="{{ asset('client/assets/images/logo-BeeBarber-1.png') }}" alt="" width="100px">
            Bee Barber
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url('/services') }}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{ url('/gallery') }}" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button">
                        Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="contactDropdown">
                        @auth
                            <div>
                                <span>{{ auth()->user()->name }}</span>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                            </div>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownToggle = document.getElementById("contactDropdown");
        const dropdownMenu = dropdownToggle.nextElementSibling;
        dropdownToggle.addEventListener("click", function(e) {
            e.preventDefault();
            dropdownMenu.classList.toggle("show");
        });
        document.addEventListener("click", function(e) {
            if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove("show");
            }
        });
    });
</script>
