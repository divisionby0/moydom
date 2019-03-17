///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
///<reference path="utils/DateUtils.ts"/>
///<reference path="utils/Cookie.ts"/>
var Catalog = (function () {
    function Catalog(ajax) {
        this.saleDialType = 1;
        this.rentDialType = 0;
        this.costMin = 0;
        this.costMax = 500000000;
        this.floorMin = 0;
        this.floorMax = 25;
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        var isFrontPage = this.$j("#frontPageAnchor").length != 0;
        if (!isFrontPage) {
            return;
        }
        console.log("isFrontPage=" + isFrontPage);
        this.setDefaults();
        this.createUIListeners();
        this.createResponseListeners();
        this.createRequest();
    }
    Catalog.prototype.setDefaults = function () {
        this.selectedEstateType = Cookie.getEstateType();
        this.selectedCity = Cookie.getCity();
        this.saleDialType = Number(Cookie.getSaleType());
        this.rentDialType = Number(Cookie.getRentType());
        this.costMin = Number(Cookie.getCostMin());
        this.costMax = Number(Cookie.getCostMax());
        this.floorMin = Number(Cookie.getFloorMin());
        this.floorMax = Number(Cookie.getFloorMax());
        console.log("saved costs: ", this.costMin, this.costMax);
        if (this.selectedEstateType == null || this.selectedEstateType == "" || this.selectedEstateType == undefined) {
            this.selectedEstateType = "houses";
            Cookie.setEstateType(this.selectedEstateType);
        }
        console.log("this.selectedEstateType='" + this.selectedEstateType + "'");
        if (this.costMin == 0) {
            this.costMin = 5000;
            Cookie.setCostMin(String(this.costMin));
        }
        if (this.costMax == 0) {
            this.costMax = 500000000;
            Cookie.setCostMax(String(this.costMax));
        }
        if (this.floorMin == 0) {
            this.floorMin = 1;
            Cookie.setFloorMin(this.floorMin.toString());
        }
        if (this.floorMax == 0) {
            this.floorMax = 25;
            Cookie.setFloorMax(this.floorMax.toString());
        }
        if (this.saleDialType == 0 && this.rentDialType == 0) {
            this.saleDialType = 1;
            this.rentDialType = 1;
            Cookie.setSaleType(String(1));
            Cookie.setRentType(String(1));
        }
        if (this.saleDialType == 1) {
            this.$j("#sailType").prop('checked', true);
        }
        else {
            this.$j("#sailType").prop('checked', false);
        }
        if (this.rentDialType == 1) {
            this.$j("#rentType").prop('checked', true);
        }
        else {
            this.$j("#rentType").prop('checked', false);
        }
        if (this.selectedCity == undefined || this.selectedCity == "" || this.selectedCity == null) {
            this.selectedCity = this.$j("#city");
            this.selectedCity = this.$j("#city option:first").val();
        }
        this.$j("#estateType option[data-type='" + this.selectedEstateType + "']").attr("selected", "selected");
        this.$j("#floorMin option[data-value='" + this.floorMin + "']").attr("selected", "selected");
        this.$j("#floorMax option[data-value='" + this.floorMax + "']").attr("selected", "selected");
        this.$j("#costMin option[data-value='" + this.costMin + "']").attr("selected", "selected");
        this.$j("#costMax option[data-value='" + this.costMax + "']").attr("selected", "selected");
        this.$j("#city").val(this.selectedCity);
        if (this.selectedEstateType == "flats") {
            this.$j("#floorNumberContainer").show();
        }
        else {
            this.$j("#floorNumberContainer").hide();
        }
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
        Cookie.setCity(this.selectedCity);
        this.createRequest();
    };
    Catalog.prototype.onEstateTypeChanged = function () {
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        Cookie.setEstateType(this.selectedEstateType);
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
        Cookie.setFloorMin(this.floorMin.toString());
        this.createRequest();
    };
    Catalog.prototype.onFloorMaxChanged = function () {
        this.floorMax = this.$j("#floorMax").find(":selected").data("value");
        Cookie.setFloorMax(this.floorMax.toString());
        this.createRequest();
    };
    Catalog.prototype.onCostMinChanged = function () {
        this.costMin = this.$j("#costMin").find(":selected").data("value");
        Cookie.setCostMin(this.costMin.toString());
        this.createRequest();
    };
    Catalog.prototype.onCostMaxChanged = function () {
        this.costMax = this.$j("#costMax").find(":selected").data("value");
        Cookie.setCostMax(this.costMax.toString());
        this.createRequest();
    };
    Catalog.prototype.createRequest = function () {
        if (this.selectedEstateType == "flats") {
            console.log("creating request estateType:" + this.selectedEstateType + "  saleDialType=" + this.saleDialType + "  rent=" + this.rentDialType + " city:" + this.selectedCity + " costMin=" + this.costMin + "  costMax=" + this.costMax + "  floorMin=" + this.floorMin + "  floorMax=" + this.floorMax);
            this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax, this.floorMin, this.floorMax);
        }
        else {
            console.log("creating request estateType:" + this.selectedEstateType + "  saleDialType=" + this.saleDialType + "  rent=" + this.rentDialType + " city:" + this.selectedCity + " costMin=" + this.costMin + "  costMax=" + this.costMax + "  floorMin=" + null + "  floorMax=" + null);
            this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax, null, null);
        }
        //this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax, this.floorMin, this.floorMax);
    };
    Catalog.prototype.onSaleDialTypeChanged = function () {
        if (this.$j("#sailType").is(':checked')) {
            this.saleDialType = 1;
        }
        else {
            this.saleDialType = 0;
        }
        Cookie.setSaleType(this.saleDialType.toString());
        this.createRequest();
    };
    Catalog.prototype.onRentDialTypeChanged = function () {
        if (this.$j("#rentType").is(':checked')) {
            this.rentDialType = 1;
        }
        else {
            this.rentDialType = 0;
        }
        Cookie.setRentType(this.rentDialType.toString());
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