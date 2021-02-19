alert = document.querySelectorAll('.alert')

alert.forEach((e, i) => {
    setTimeout(() => {
        e.classList.remove('visible')
    }, 2000 * (i+1))
});

let title = new Typed('.desc', {
    strings: ["Discover your way to effortless weight loss,<br>vibrant health, and boundless energy."],
    typeSpeed: 40,
    cursorChar: '',
})
