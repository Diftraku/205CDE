describe("notes module", function () {

	describe('adding a note', function() {
		beforeEach(function() {
			notes.clear();
			notes.add('first note');
			notes.add('second note');
			notes.add('third note');
			notes.add('fourth note');
			notes.add('fifth note');
		});

		it('should be able to add a new note', function () {
			expect(notes.add('note')).toBe(true);
			expect(notes.count()).toBe(6);
		});

		it('should ignore blank notes', function () {
			expect(notes.add('')).toBe(false);
			expect(notes.count()).toBe(5);
		});

		it('should ignore notes containing only whitespace', function () {
			expect(notes.add('      ')).toBe(false);
			expect(notes.count()).toBe(5);
		});
		it('should require a string parameter', function () {
			expect(notes.add(42)).toBe(false);
			expect(notes.count()).toBe(5);
		});
	});

	describe('deleting a note', function() {
		beforeEach(function() {
			notes.clear();
			notes.add('first note');
			notes.add('second note');
			notes.add('third note');
			notes.add('fourth note');
			notes.add('fifth note');
		});

		it('should be able to delete the first index', function () {
			expect(notes.remove(0)).toBe(true);
			expect(notes.count()).toBe(4);
		});

		it('should be able to delete the last index', function () {
			expect(notes.remove(notes.count()-1)).toBe(true);
			expect(notes.count()).toBe(4);
		});

		it('should return false if index is out of range', function () {
			expect(notes.remove(notes.count())).toBe(false);
			expect(notes.count()).toBe(5);
		});

		it('should return false if the parameter is missing', function () {
			expect(notes.remove()).toBe(false);
			expect(notes.count()).toBe(5);
		});
	});


	describe('searching for a note', function() {
		beforeEach(function() {
			notes.clear();
			notes.add('first note');
			notes.add('second note');
			notes.add('third note');
			notes.add('fourth note');
			notes.add('fifth note');
		});

		it('should return all notes containing `note` when searching for `note`', function () {
			expect(notes.find('note').length).toBe(5);
		});
		it('should return all notes containing `note` when searching for `Note`', function () {
			expect(notes.find('Note').length).toBe(5);
		});
		it('should return three notes when searching for `th`', function () {
			expect(notes.find('th').length).toBe(3);
		});
		it('should return one note when searching for `four`', function () {
			expect(notes.find('four').length).toBe(1);
			expect(notes.find('four')[0].text).toBe('fourth note');
		});
		it('should return false when searching for `six`', function () {
			expect(notes.find('six')).toBe(false);
		});
		it('should return false if the string is blank', function () {
			expect(notes.find('')).toBe(false);
		});
		it('should return false if the parameter is missing', function () {
			expect(notes.find()).toBe(false);
		});
	});
});
