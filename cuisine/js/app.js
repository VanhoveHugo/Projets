alert = document.querySelectorAll('.alert')

alert.forEach((e, i) => {
    setTimeout(() => {
        e.classList.remove('visible')
    }, 2000 * (i+1))
});