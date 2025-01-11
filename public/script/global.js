//menu burger version mobile
document.addEventListener('DOMContentLoaded', () => {
    const burger = document.getElementById('burger');
    const menu = document.getElementById('menu');

    if (burger && menu) {
        burger.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    } else {
        console.error('Les éléments burger ou menu ne sont pas trouvés dans le DOM.');
    }
});
