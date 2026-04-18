/**
 * HOSTZERA - Main JavaScript
 * Handles: Navbar dropdown, Mobile menu, Animations
 */

document.addEventListener('DOMContentLoaded', function () {
    // ============================
    // Navbar - Services Dropdown
    // ============================
    const servicesDropdown = document.getElementById('servicesDropdown');
    const megaMenu = document.getElementById('megaMenu');
    const dropdownTrigger = document.getElementById('dropdownTrigger');

    if (servicesDropdown && megaMenu) {
        // Desktop: hover
        servicesDropdown.addEventListener('mouseenter', function () {
            if (!window.matchMedia('(max-width: 960px)').matches) {
                megaMenu.style.display = 'block';
                const chevron = dropdownTrigger.querySelector('[data-lucide="chevron-down"]');
                if (chevron) chevron.classList.add('rotate');
            }
        });

        servicesDropdown.addEventListener('mouseleave', function () {
            if (!window.matchMedia('(max-width: 960px)').matches) {
                megaMenu.style.display = 'none';
                const chevron = dropdownTrigger.querySelector('[data-lucide="chevron-down"]');
                if (chevron) chevron.classList.remove('rotate');
            }
        });

        // Mobile: click
        dropdownTrigger.addEventListener('click', function (e) {
            if (window.matchMedia('(max-width: 960px)').matches) {
                e.preventDefault();
                const isOpen = megaMenu.style.display === 'block';
                megaMenu.style.display = isOpen ? 'none' : 'block';
                const chevron = dropdownTrigger.querySelector('[data-lucide="chevron-down"]');
                if (chevron) chevron.classList.toggle('rotate', !isOpen);
            }
        });
    }

    // ============================
    // Mobile Menu Toggle
    // ============================
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const navLinks = document.getElementById('navLinks');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const menuIcon = document.getElementById('menuIcon');

    function toggleMobileMenu() {
        const isOpen = navLinks.classList.contains('mobile-open');

        if (isOpen) {
            navLinks.classList.remove('mobile-open');
            mobileOverlay.style.display = 'none';
            menuIcon.setAttribute('data-lucide', 'menu');
        } else {
            navLinks.classList.add('mobile-open');
            mobileOverlay.style.display = 'block';
            menuIcon.setAttribute('data-lucide', 'x');
        }
        // Re-render icons after changing data-lucide
        lucide.createIcons();
    }

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', toggleMobileMenu);
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', toggleMobileMenu);
    }

    // Close mobile menu when a link is clicked
    if (navLinks) {
        navLinks.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                if (navLinks.classList.contains('mobile-open')) {
                    toggleMobileMenu();
                }
            });
        });
    }

    // ============================
    // Smooth Scroll for anchor links
    // ============================
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
});
