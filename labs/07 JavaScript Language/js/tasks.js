// tasks.js
// This script manages a to-do list.

// Need a global variable:
var tasks = []; 

// Function called when the form is submitted.
// Function adds a task to the global array.
function addTask() {
    'use strict';

    // Get the task:
    var task = document.getElementById('task');

    if (task.value) {
    
        // Add the item to the array:
        tasks.push(task.value);

	    // Refactored drawing the task list to separate function
        drawTaskList();
        
    } // End of task.value IF.

    // Return false to prevent submission:
    return false;
    
} // End of addTask() function.

function drawTaskList() {
	// Reference to where the output goes:
	var output = document.getElementById('output');

	// Update the page:
	var message = '<h2>To-Do</h2><ol>';
	for (var i = 0, count = tasks.length; i < count; i++) {
		message += '<li>' + tasks[i] + '</li>';
	}
	message += '</ol>';
	output.innerHTML = message;
}

function removeDuplicates() {
	// @see http://stackoverflow.com/a/16747921
	tasks = tasks.filter(function(elem, index, self) {
		return index == self.indexOf(elem);
	});

	// Redraw the task list
	drawTaskList();
}

// Initial setup:
function init() {
    'use strict';
    document.getElementById('theForm').onsubmit = addTask;
    document.getElementById('dedupe').onclick = removeDuplicates;
} // End of init() function.
window.onload = init;