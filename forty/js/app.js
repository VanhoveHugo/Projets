document.onreadystatechange = function () {
    if (document.readyState == "complete") {
    	window.scroll(0,0)
   	}
}

let btn_open = document.getElementById('burger'),
	btn_close = document.getElementById('close'),
	nav = document.getElementById('nav'),
	body = document.getElementById('body');

btn_open.onclick = () => {
	nav.classList.remove('hidden');
};
btn_close.onclick = () => {
	nav.classList.add('hidden');
};

setTimeout(() => 

window.addEventListener('scroll', function(e) {
	let header = document.getElementById('header');
	if(window.scrollY <= 100) {
		header.classList.remove('color');
	} else {
		header.classList.add('color');
	}

}), 700)
