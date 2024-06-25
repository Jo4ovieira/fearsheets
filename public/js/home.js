window.onload = function typeWriter() {
    const content = document.getElementById('title1')
    const type = content.innerText.split('')

    content.innerHTML = ''

    type.forEach((letra, i) => {
        setTimeout(() => content.innerHTML += letra , 100 * i)
    })

    const content2 = document.getElementById('title2')
    const type2 = content2.innerText.split('')

    content2.innerHTML = ''

    setTimeout(function(){
        type2.forEach((letra, i) => {
            setTimeout(() => content2.innerHTML += letra , 200 * i)
        })
    }, 4400)
}
