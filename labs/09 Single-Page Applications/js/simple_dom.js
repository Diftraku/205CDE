//console.log('page loaded');

console.log(document);
document.fields = [
	document.querySelector('#userForm input[type="text"]'),
	document.querySelector('#userForm input[type="email"]'),
	document.querySelector('#userForm input[type="password"]')
];

document.targets = [
	document.querySelector('#summary h1'),
	document.querySelectorAll('#summary p')[0],
	document.querySelectorAll('#summary p')[1]
];
for (var i = 0; i < document.fields.length; i++) {
		document.fields[i].addEventListener('keyup', function() {
		console.log('updating fields');
		console.log(document.fields, document.targets);
		for (var j = 0; j < document.fields.length; j++) {
			document.targets[j].innerText = document.fields[j].value;
		}
	});
}


document.querySelector('#userForm input[type="email"]').onkeydown = function (event) {
	console.log('Received on keydown for email', event);
};

document.querySelector('#userForm input[type="email"]').onmouseover = function (event) {
	console.log('Mouse moved over the email field', event);
};

document.querySelector('#userForm input[type="email"]').onmouseout = function (event) {
	console.log('Mouse moved out of the email field', event);
};

document.querySelector('#userForm input[type="email"]').onchange = function (event) {
	console.log('Email field changed', event);
};
