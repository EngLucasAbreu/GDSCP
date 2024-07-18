document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item');
    const toggleButton = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            const subNav = this.nextElementSibling;
            if (subNav && subNav.classList.contains('sub-nav')) {
                subNav.classList.toggle('open');
                const chevron = this.querySelector('.chevron-toggle');
                if (chevron) {
                    chevron.classList.toggle('rotated');
                }
            }
        });
    });

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('open');
        if (sidebar.classList.contains('open')) {
            mainContent.style.marginLeft = '0';
        } else {
            mainContent.style.marginLeft = '0';
        }
    });
});
