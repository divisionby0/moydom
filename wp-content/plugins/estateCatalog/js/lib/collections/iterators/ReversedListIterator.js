///<reference path="../List.ts"/>
var ReversedListIterator = (function () {
    function ReversedListIterator(_collection) {
        this.counter = -1;
        this.collection = _collection;
        this.counter = this.collection.size();
    }
    ReversedListIterator.prototype.hasPrev = function () {
        var prevIndex = this.counter - 1;
        if (prevIndex > -1) {
            return true;
        }
        else {
            return false;
        }
    };
    ReversedListIterator.prototype.prev = function () {
        this.counter -= 1;
        return this.collection.get(this.counter);
    };
    return ReversedListIterator;
}());
//# sourceMappingURL=ReversedListIterator.js.map