/// <reference path="iterators/ListIterator.ts"/>
///<reference path="iterators/ReversedListIterator.ts"/>
var List = (function () {
    function List(id) {
        if (id) {
            this.id = id;
        }
        this.items = [];
    }
    List.prototype.size = function () {
        return this.items.length;
    };
    List.prototype.add = function (value) {
        this.items.push(value);
    };
    List.prototype.get = function (index) {
        return this.items[index];
    };
    List.prototype.remove = function (index) {
        this.items.splice(index, 1);
    };
    List.prototype.removeByValue = function (value) {
        var result = false;
        var index = -1;
        for (var i = 0; i < this.size(); i++) {
            var currentItem = this.items[i];
            if (parseInt(currentItem) === value) {
                index = i;
                break;
            }
        }
        if (index != -1) {
            result = true;
            this.remove(index);
        }
        return result;
    };
    List.prototype.findIndex = function (value) {
        var returnValue = -1;
        for (var i = 0; i < this.size(); i++) {
            var currentItem = this.items[i];
            if (currentItem === value) {
                returnValue = i;
                break;
            }
        }
        return returnValue;
    };
    List.prototype.has = function (value) {
        return this.findIndex(value) != -1;
    };
    List.prototype.clear = function () {
        this.items = [];
    };
    List.prototype.getIterator = function () {
        return new ListIterator(this);
    };
    List.prototype.getReversedIterator = function () {
        return new ReversedListIterator(this);
    };
    List.prototype.setId = function (id) {
        this.id = id;
    };
    List.prototype.getId = function () {
        return this.id;
    };
    return List;
}());
//# sourceMappingURL=List.js.map