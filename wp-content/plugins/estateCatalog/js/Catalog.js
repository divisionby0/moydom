///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
var Catalog = (function () {
    function Catalog(ajax) {
        this.saleDialType = 1;
        this.rentDialType = 0;
        this.costMin = 0;
        this.costMax = 9000000;
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        this.setDefaults();
        this.createUIListeners();
        this.createResponseListeners();
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
        this.$j("#sailType").change(function () { return _this.onSaleDialTypeChanged(); });
        this.$j("#rentType").change(function () { return _this.onRentDialTypeChanged(); });
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
        this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax);
    };
    Catalog.prototype.onSaleDialTypeChanged = function () {
        if (this.$j("#sailType").is(':checked')) {
            this.saleDialType = 1;
        }
        else {
            this.saleDialType = 0;
        }
        this.createRequest();
    };
    Catalog.prototype.onRentDialTypeChanged = function () {
        if (this.$j("#rentType").is(':checked')) {
            this.rentDialType = 1;
        }
        else {
            this.rentDialType = 0;
        }
        this.createRequest();
    };
    Catalog.prototype.onResponse = function (data) {
        try {
            var estates = JSON.parse(data);
            console.log("response: ", estates);
            this.renderCollection(estates);
        }
        catch (error) {
            console.log("error parsing data ", data);
        }
    };
    Catalog.prototype.renderCollection = function (collection) {
        this.$j("#estatesListContainer").empty();
        for (var i = 0; i < collection.length; i++) {
            var estate = collection[i];
            new EstateListRenderer(this.$j("#estatesListContainer"), estate);
        }
    };
    Catalog.prototype.createResponseListeners = function () {
        var _this = this;
        EventBus.addEventListener(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, function (data) { return _this.onResponse(data); });
    };
    return Catalog;
}());
//# sourceMappingURL=Catalog.js.map