var CityMetabox = (function () {
    function CityMetabox() {
        var _this = this;
        this.$j = jQuery.noConflict();
        console.log("Im CityMetabox j=", this.$j);
        this.$j("#citySelect").change(function () { return _this.onChanged(event); });
    }
    CityMetabox.prototype.onChanged = function (event) {
        console.log("changed");
        this.updateSelection();
    };
    CityMetabox.prototype.updateSelection = function () {
        var selectedCity = this.$j("#citySelect").find(":selected").text();
        this.$j("#selectedCityEditor").val(selectedCity);
    };
    return CityMetabox;
}());
//# sourceMappingURL=CityMetabox.js.map