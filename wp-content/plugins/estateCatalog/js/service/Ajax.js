///<reference path="../lib/events/EventBus.ts"/>
///<reference path="AjaxServiceEvent.ts"/>
var Ajax = (function () {
    function Ajax() {
        this.j = jQuery.noConflict();
    }
    Ajax.prototype.getEstates = function (estateType, dialTypeCollection, city) {
        var _this = this;
        var data = { 'action': 'getEstates',
            'estateType': estateType,
            'dialTypeCollection': dialTypeCollection,
            'city': city
        };
        this.j.post(ajaxurl, data, function (response) { return _this.onFilteredEstatesResponse(response); });
    };
    Ajax.prototype.onFilteredEstatesResponse = function (response) {
        console.log("onFilteredEstatesResponse: ", response);
        EventBus.dispatchEvent(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, response);
    };
    return Ajax;
}());
//# sourceMappingURL=Ajax.js.map