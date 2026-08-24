
/*ハンバーガーメニューの開閉*/
document.addEventListener('DOMContentLoaded', () => {
    const headerMenu = document.querySelector('.header-menu');
    const hamburger = document.querySelector('.hamburger');
    const navItems = document.querySelector('.nav-items');

    if (headerMenu && hamburger && navItems) {
        headerMenu.addEventListener('click', (e) => {
            e.preventDefault();
            hamburger.classList.toggle('is-open');
            navItems.classList.toggle('is-open');
        });
        const navLinks = navItems.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('is-open');
                navItems.classList.remove('is-open');
            });
        });
    }
});