///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
var Catalog = (function () {
    function Catalog(ajax) {
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        this.setDefaults();
        this.createUIListeners();
        this.createRequest();
    }
    Catalog.prototype.setDefaults = function () {
        this.selectedEstateType = Constants.HOUSES;
        this.selectedCity = this.$j("#city").find(":selected").text();
    };
    Catalog.prototype.createUIListeners = function () {
        var _this = this;
        this.$j("#estateType").change(function () { return _this.onEstateTypeChanged(); });
        this.$j("#city").change(function () { return _this.onCityChanged(); });
    };
    Catalog.prototype.onCityChanged = function () {
        this.selectedCity = this.$j("#city").find(":selected").text();
        this.createRequest();
    };
    Catalog.prototype.onEstateTypeChanged = function () {
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        this.createRequest();
    };
    Catalog.prototype.createRequest = function () {
        this.ajax.getEstates(this.selectedEstateType, new Array(), this.selectedCity);
    };
    return Catalog;
}());
//# sourceMappingURL=Catalog.js.map