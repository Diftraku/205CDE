/*jshint eqeqeq:false */
(function (window) {
	'use strict';
	window.$ = function () {

	};
	window.$.id = function(id) {
		return document.getElementById(id);
	};
	return window.$;
})(window);
