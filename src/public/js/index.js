document.addEventListener('DOMContentLoaded', () => {
    // ハンバーガーメニュー
    hamburgerMenu();
    // スライドショー
    slideShow();
});

function hamburgerMenu() {
    const hamburger = document.querySelector('.hamburger');
    const nav = document.querySelector('.nav');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        nav.classList.toggle('active');

        // アクセシビリティ対応
        const isOpen = hamburger.classList.contains('active');
        hamburger.setAttribute('aria-expanded', isOpen);
        nav.setAttribute('aria-hidden', !isOpen);
    });

    // メニューの外側をクリックした時の処理
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.nav') && !e.target.closest('.hamburger') && nav.classList.contains('active')) {
            hamburger.classList.remove('active');
            nav.classList.remove('active');
            hamburger.setAttribute('aria-expanded', false);
            nav.setAttribute('aria-hidden', true);
        }
    });
}

function slideShow() {

}

function showPasswordClick() {
    var inputPasswordType = document.getElementById("inputPassword");

    if (inputPasswordType.type == 'password') {
        inputPasswordType.type = 'text';
    }
    if (inputPasswordType.type == 'text') {
        inputPasswordType.type = 'password';
    }
}