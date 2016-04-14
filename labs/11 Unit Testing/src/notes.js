var notes = (function() {
	var list = [];

	return {
		add: function(note) {
			if (typeof note == "string") {
				if (note == '') {
					console.error('Note is blank');
					return false;
				}
				if (/^\s+$/.test(note)) {
					console.error('Note is only whitespace');
					return false;
				}
				var item = {timestamp: Date.now(), text: note};
				list.push(item);
				return true;
			}
			console.error("Bad value for note");
			return false;
		},
		remove: function(index) {
			if (typeof index == "number") {
				if (index > -1 && index < this.count()) {
					list.splice(index, 1);
					return true;
				}
				return false;
			}
			return false;
		},
		count: function() {
			return list.length;
		},
		list: function() {
			for (var item in list) {
				console.log(item);
			}
		},
		find: function(str) {
			var found = [];
			if (typeof str == "string") {
				if (str == '') {
					console.error('Search text is blank');
					return false;
				}
				if (/^\s+$/.test(str)) {
					console.error('Search text is only whitespace');
					return false;
				}
				for (var i = 0; i < this.count(); i++) {
					if (list[i].text.match(new RegExp(str, "i"))) {
						found.push(list[i]);
					}
				}
				if (found.length != 0) {
					return found;
				}
				return false;
			}
			return false;
		},
		clear: function() {
			list.splice(0, list.length);
		}
	}
}());