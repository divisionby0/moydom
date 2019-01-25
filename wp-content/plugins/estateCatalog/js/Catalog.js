///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
///<reference path="utils/DateUtils.ts"/>
var Catalog = (function () {
    function Catalog(ajax) {
        this.saleDialType = 1;
        this.rentDialType = 0;
        this.costMin = 0;
        this.costMax = 150000000;
        this.floorMin = 0;
        this.floorMax = 25;
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
        console.log("createUIListeners estateType=", this.$j("#estateType"));
        this.$j("#estateType").change(function () { return _this.onEstateTypeChanged(); });
        this.$j("#city").change(function () { return _this.onCityChanged(); });
        this.$j("#sailType").change(function () { return _this.onSaleDialTypeChanged(); });
        this.$j("#rentType").change(function () { return _this.onRentDialTypeChanged(); });
        this.$j("#costMin").change(function () { return _this.onCostMinChanged(); });
        this.$j("#costMax").change(function () { return _this.onCostMaxChanged(); });
        this.$j("#dateSort").click(function (event) { return _this.onDateSortClicked(event); });
        this.$j("#costSort").click(function (event) { return _this.onCostSortClicked(event); });
        this.$j("#floorMin").change(function () { return _this.onFloorMinChanged(); });
        this.$j("#floorMax").change(function () { return _this.onFloorMaxChanged(); });
    };
    Catalog.prototype.onDateSortClicked = function (event) {
        event.preventDefault();
        this.$j("#estatesListContainer").empty();
        this.estates.sort(this.sortByDate);
        this.renderCollection();
        return false;
    };
    Catalog.prototype.onCostSortClicked = function (event) {
        event.preventDefault();
        this.$j("#estatesListContainer").empty();
        this.estates.sort(this.sortByCost);
        this.renderCollection();
        return false;
    };
    Catalog.prototype.onCityChanged = function () {
        this.selectedCity = this.$j("#city").find(":selected").text();
        this.createRequest();
    };
    Catalog.prototype.onEstateTypeChanged = function () {
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        if (this.selectedEstateType == "flats") {
            this.$j("#floorNumberContainer").show();
        }
        else {
            this.$j("#floorNumberContainer").hide();
        }
        this.createRequest();
    };
    Catalog.prototype.onFloorMinChanged = function () {
        this.floorMin = this.$j("#floorMin").find(":selected").data("value");
        this.createRequest();
    };
    Catalog.prototype.onFloorMaxChanged = function () {
        this.floorMax = this.$j("#floorMax").find(":selected").data("value");
        this.createRequest();
    };
    Catalog.prototype.onCostMinChanged = function () {
        this.costMin = this.$j("#costMin").find(":selected").data("value");
        this.createRequest();
    };
    Catalog.prototype.onCostMaxChanged = function () {
        this.costMax = this.$j("#costMax").find(":selected").data("value");
        this.createRequest();
    };
    Catalog.prototype.createRequest = function () {
        console.log("creating request estateType:" + this.selectedEstateType + "  saleDialType=" + this.saleDialType + "  rent=" + this.rentDialType + " city:" + this.selectedCity + " costMin=" + this.costMin + "  costMax=" + this.costMax + "  floorMin=" + this.floorMin + "  floorMax=" + this.floorMax);
        this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax, this.floorMin, this.floorMax);
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
            this.estates = JSON.parse(data);
            console.log("response: ", this.estates);
        }
        catch (error) {
            console.log("error parsing data ", data);
        }
        this.renderCollection();
    };
    Catalog.prototype.renderCollection = function () {
        this.$j("#estatesListContainer").empty();
        for (var i = 0; i < this.estates.length; i++) {
            var estate = this.estates[i];
            new EstateListRenderer(this.$j("#estatesListContainer"), estate);
        }
    };
    Catalog.prototype.sortByCost = function (a, b) {
        if (a.cost < b.cost)
            return -1;
        if (a.cost > b.cost)
            return 1;
        return 0;
    };
    Catalog.prototype.sortByDate = function (a, b) {
        if (DateUtils.toTimestamp(a.date) < DateUtils.toTimestamp(b.date))
            return -1;
        if (DateUtils.toTimestamp(a.date) > DateUtils.toTimestamp(b.date))
            return 1;
        return 0;
    };
    Catalog.prototype.createResponseListeners = function () {
        var _this = this;
        EventBus.addEventListener(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, function (data) { return _this.onResponse(data); });
    };
    return Catalog;
}());
//# sourceMappingURL=Catalog.js.map