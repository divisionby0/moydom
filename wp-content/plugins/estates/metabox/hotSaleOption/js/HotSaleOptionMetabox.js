var HotSaleOptionMetabox = (function () {
    function HotSaleOptionMetabox() {
        this.isHotSale = 0;
        this.$j = jQuery.noConflict();
        console.log("Im hotSaleOption metabox");
        this.createListeners();
    }
    HotSaleOptionMetabox.prototype.createListeners = function () {
        var _this = this;
        console.log("Creater listeners");
        this.$j("#hotSaleOption").change(function () { return _this.onHotSaleOptionChanged(event); });
    };
    HotSaleOptionMetabox.prototype.onHotSaleOptionChanged = function (event) {
        var isHotSale = this.$j("#hotSaleOption").is(':checked');
        if (isHotSale) {
            this.isHotSale = 1;
        }
        else {
            this.isHotSale = 0;
        }
        this.updateEditor();
    };
    HotSaleOptionMetabox.prototype.updateEditor = function () {
        this.$j("#hotSaleOptionEditor").val(this.isHotSale);
    };
    return HotSaleOptionMetabox;
}());
//# sourceMappingURL=HotSaleOptionMetabox.js.map