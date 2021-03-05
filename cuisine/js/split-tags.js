const area = document.getElementById('tags');
const ul = document.getElementById('liste');

area.addEventListener('keyup', e => {
    createSelection(e.target.value)
    if(e.key === 'Enter') {
        setTimeout(() => {
            e.target.value = ''
        }, 10)

        randomSelect()
    }
})

function createSelection(v) {
    const arr = v.split(';').filter(tag => tag.trim() !== '').map(tag => tag.trim())
    
    ul.innerHTML = ''

    arr.forEach(e => {
        const elm = document.createElement('span')
        elm.classList.add('tag')
        elm.innerText = e
        ul.appendChild(elm)
    });
    
}

function randomSelect() {
    const timer = 30;
    const interval = setInterval(() => {
        const randomTag = pickRandomTag()

        highlightTag(randomTag)

        setTimeout(() => {
            unHighlightTag(randomTag)
        }, 100)
    }, 100);
    setTimeout(() => {
        clearInterval(interval)

        setTimeout(() => {
            const random = pickRandomTag()

            highlightTag(random)
        }, 100)
    }, timer * 100)
}


function pickRandomTag() {
    const tags = document.querySelectorAll('.tag')
    return tags[Math.floor(Math.random() * tags.length)]
}

function highlightTag(tag) {
    tag.classList.add('win')
}

function unHighlightTag(tag) {
    tag.classList.remove('win')
}