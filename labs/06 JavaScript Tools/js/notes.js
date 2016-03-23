'use strict';
var notes = [];

function addItem() {
	var textbox = document.getElementById('item');
	var itemText = textbox.value;
	textbox.value = '';
	textbox.focus();
	var newItem = {title: itemText, quantity: 1};
	var exists = false;
	notes.forEach(function(item){
		if (item.title == newItem.title) {
			item.quantity += 1;
			exists = true;
		}
	});
	if (!exists) {
		notes.push(newItem);
	}
	saveList();
	displayList();
}

function displayList() {
	var table = document.getElementById('list');
	table.innerHTML = '';
	for (var i = 0; i<notes.length; i++) {
		var note = notes[i];
		var node = document.createElement('tr');
		node.innerHTML = '<td>'+note.title+'</td><td>'+note.quantity+'</td><td><a href="#" onClick="deleteIndex('+i+')">delete</td>';
		table.appendChild(node);
	}
}

function deleteIndex(i) {
	notes.splice(i, 1);
	displayList();
}

function saveList() {
	localStorage.notes = JSON.stringify(notes);
}

function loadList() {
	console.log('loadList');
	if (localStorage.notes) {
		notes = JSON.parse(localStorage.notes);
		displayList();
	}
}

window.onload = function () {
	loadList();
};

var button = document.getElementById('add');
button.onclick = addItem;
