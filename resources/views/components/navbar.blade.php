<nav class="navbar" id="main-navbar">
    <div class="navbar-container">
        <div class="navbar-left">
            <a href="{{ route('home') }}" class="nav-logo">
                <div class="logo-icon">
                    <div class="logo-inner">H</div>
                </div>
                <div class="logo-text">HOST<span>ZERA</span></div>
            </a>

            <ul class="nav-links" id="navLinks">
                <li><a href="#">Pricing</a></li>
                <li class="has-dropdown" id="servicesDropdown">
                    <button class="dropdown-trigger" onclick="toggleServicesMenu()">
                        Services <i data-lucide="chevron-down" style="width:14px;height:14px;"></i>
                    </button>

                    <div class="mega-menu" id="megaMenu" style="display:none;">
                        <div class="mega-menu-header">
                            <span>Our Services</span>
                        </div>
                        <div class="mega-menu-content">
                            @foreach($global_categories as $cat)
                            <a href="{{ route('services.display', $cat->slug) }}" class="mega-menu-item">
                                <div class="item-icon">
                                    @if($cat->icon_image)
                                        <img src="{{ asset('storage/' . $cat->icon_image) }}" alt="{{ $cat->name }}" style="width:24px;height:24px;object-contain;">
                                    @else
                                        <i data-lucide="{{ $cat->icon }}" style="width:22px;height:22px;"></i>
                                    @endif
                                </div>
                                <div class="item-text">
                                    <h4>{{ $cat->name }}</h4>
                                    <p>{{ $cat->description ?? 'Fast and secure hosting services for your business.' }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li><a href="#">Explore</a></li>
                <li><a href="#">Support</a></li>

                {{-- Mobile-only links --}}
                @guest
                    <li class="mobile-only">
                        <a href="{{ route('login') }}" class="mobile-login">Login</a>
                    </li>
                    <li class="mobile-only">
                        <a href="{{ route('register') }}" class="mobile-signup">Get Started</a>
                    </li>
                @else
                    <li class="mobile-only">
                        <a href="{{ route('dashboard') }}" class="mobile-login">Dashboard</a>
                    </li>
                    <li class="mobile-only">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="mobile-signup" style="width:100%; border:none; text-align:left; cursor:pointer;">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>

        <div class="navbar-right">
            <button class="lang-btn icon-only" title="Change Language">
                <i data-lucide="globe" style="width:20px;height:20px;"></i>
            </button>
            @guest
                <a href="{{ route('login') }}" class="nav-login-link desktop-only">Login</a>
                <a href="{{ route('register') }}" class="get-started-nav desktop-only">Get Started</a>
            @else
                <a href="{{ route('dashboard') }}" class="nav-login-link desktop-only">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="desktop-only" style="display:inline;">
                    @csrf
                    <button type="submit" class="get-started-nav" style="border:none; cursor:pointer;">Logout</button>
                </form>
            @endguest

            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" id="mobileMenuBtn">
                <i data-lucide="menu" style="width:28px;height:28px;" id="menuIcon"></i>
            </button>
        </div>
    </div>

    <div class="mobile-menu-overlay" id="mobileOverlay" style="display:none;" onclick="toggleMobileMenu()"></div>
</nav>

@push('scripts')
<script>
    let isMobileMenuOpen = false;
    let isServicesOpen = false;

    function toggleMobileMenu() {
        isMobileMenuOpen = !isMobileMenuOpen;
        const navLinks = document.getElementById('navLinks');
        const overlay = document.getElementById('mobileOverlay');
        const menuBtn = document.getElementById('mobileMenuBtn');

        if (isMobileMenuOpen) {
            navLinks.classList.add('mobile-open');
            overlay.style.display = 'block';
            menuBtn.innerHTML = '<i data-lucide="x" style="width:28px;height:28px;"></i>';
        } else {
            navLinks.classList.remove('mobile-open');
            overlay.style.display = 'none';
            menuBtn.innerHTML = '<i data-lucide="menu" style="width:28px;height:28px;"></i>';
        }
        lucide.createIcons();
    }

    function toggleServicesMenu() {
        isServicesOpen = !isServicesOpen;
        const megaMenu = document.getElementById('megaMenu');
        megaMenu.style.display = isServicesOpen ? 'block' : 'none';
    }

    // Desktop hover behavior for services dropdown
    const servicesDropdown = document.getElementById('servicesDropdown');
    if (window.matchMedia("(min-width: 961px)").matches) {
        servicesDropdown.addEventListener('mouseenter', function () {
            document.getElementById('megaMenu').style.display = 'block';
        });
        servicesDropdown.addEventListener('mouseleave', function () {
            document.getElementById('megaMenu').style.display = 'none';
        });
    }
</script>
@endpush
