///<reference path="../lib/events/EventBus.ts"/>
///<reference path="AjaxServiceEvent.ts"/>
var Ajax = (function () {
    function Ajax() {
        this.j = jQuery.noConflict();
    }
    Ajax.prototype.search = function (value) {
        var _this = this;
        var data = { 'action': 'searchForEstate',
            'id': value
        };
        this.j.post(ajaxurl, data, function (response) { return _this.onSearchEstatesResponse(response); });
    };
    Ajax.prototype.getEstates = function (estateType, saleDialType, rentDialType, city, costMin, costMax, floorMin, floorMax, rooms) {
        var _this = this;
        var data = { 'action': 'getEstates',
            'estateType': estateType,
            'saleDialType': saleDialType,
            'rentDialType': rentDialType,
            'costMin': costMin,
            'costMax': costMax,
            'floorMin': floorMin,
            'floorMax': floorMax,
            'rooms': rooms,
            'city': city
        };
        this.j.post(ajaxurl, data, function (response) { return _this.onFilteredEstatesResponse(response); });
    };
    Ajax.prototype.onFilteredEstatesResponse = function (response) {
        console.log("response:", response);
        EventBus.dispatchEvent(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, response);
    };
    Ajax.prototype.onSearchEstatesResponse = function (response) {
        EventBus.dispatchEvent(AjaxServiceEvent.ON_SEARCH_RESULT, response);
    };
    return Ajax;
}());
//# sourceMappingURL=Ajax.js.map