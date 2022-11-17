function openForm($x) {
	console.log($x);
	document.getElementById($x).style.display = 'block';
	// document.getElementById('blr').style.filter = 'blur(10px) grayscale(100%)';
	// document.getElementById('blr').style.opacity = 0.5;
	document.querySelector('h1').style.filter = 'blur(10px)  grayscale(100%)';
}

function closeForm($x) {
	console.log($x);
	document.getElementById($x).style.display = 'none';
	document.getElementById('blr').style.filter = 'blur(0) grayscale(0)';
	document.querySelector('h1').style.filter = 'blur(0) grayscale(0)';
}
