
var request = new XMLHttpRequest();
request.open('GET', 'https://raw.githubusercontent.com/Diftraku/205CDE/master/labs/09%20Single-Page%20Applications/data/books.json', false);
request.send(null);
var data = JSON.parse(request.responseText);
console.log(data);

document.body.appendChild(document.createElement('h1'));

var books = data.books;
var list = document.createElement('table');
var heading = list.appendChild(document.createElement('thead'));
var headingColumn = heading.appendChild(document.createElement('th'));
headingColumn.innerText = 'Title';
headingColumn = heading.appendChild(document.createElement('th'));
headingColumn.innerText = 'Year';
headingColumn = heading.appendChild(document.createElement('th'));
headingColumn.innerText = 'ISBN';
headingColumn = heading.appendChild(document.createElement('th'));
headingColumn.innerText = 'Authors';

for (var i=0; i < books.length; i++) {
	var row = document.createElement('tr');
	row.addEventListener('click', function (event) {
		document.querySelector('body h1').innerText = event.target.firstChild.data;
	});
	for (var field in books[i]) {
		var cell = row.appendChild(document.createElement('td'));
		if (books[i].hasOwnProperty(field)) {
			cell.innerText = books[i][field];
		}
	}
	list.appendChild(row);
}
document.body.appendChild(list);
