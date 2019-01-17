///<reference path="../lib/events/EventBus.ts"/>
///<reference path="AjaxServiceEvent.ts"/>
var Ajax = (function () {
    function Ajax() {
        this.j = jQuery.noConflict();
    }
    Ajax.prototype.getEstates = function (estateType, saleDialType, rentDialType, city, costMin, costMax, floorMin, floorMax) {
        var _this = this;
        var data = { 'action': 'getEstates',
            'estateType': estateType,
            'saleDialType': saleDialType,
            'rentDialType': rentDialType,
            'costMin': costMin,
            'costMax': costMax,
            'floorMin': floorMin,
            'floorMax': floorMax,
            'city': city
        };
        this.j.post(ajaxurl, data, function (response) { return _this.onFilteredEstatesResponse(response); });
    };
    Ajax.prototype.onFilteredEstatesResponse = function (response) {
        EventBus.dispatchEvent(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, response);
    };
    return Ajax;
}());
//# sourceMappingURL=Ajax.js.map