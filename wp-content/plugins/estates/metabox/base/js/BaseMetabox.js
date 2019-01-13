var BaseMetabox = (function () {
    function BaseMetabox() {
        this.hasValue = 0;
        this.$j = jQuery.noConflict();
        this.createListeners();
    }
    BaseMetabox.prototype.createListeners = function () {
        var _this = this;
        this.$j("#" + this.getCheckboxId()).change(function () { return _this.onValueChanged(event); });
    };
    BaseMetabox.prototype.onValueChanged = function (event) {
        var hasValue = this.$j("#" + this.getCheckboxId()).is(':checked');
        if (hasValue) {
            this.hasValue = 1;
        }
        else {
            this.hasValue = 0;
        }
        this.updateEditor();
    };
    BaseMetabox.prototype.updateEditor = function () {
        this.$j("#" + this.getEditorId()).val(this.hasValue);
    };
    BaseMetabox.prototype.getCheckboxId = function () {
        return "";
    };
    BaseMetabox.prototype.getEditorId = function () {
        return "";
    };
    return BaseMetabox;
}());
//# sourceMappingURL=BaseMetabox.js.map