var BaseOptionMetabox = (function () {
    function BaseOptionMetabox() {
        this.hasValue = 0;
        this.$j = jQuery.noConflict();
        this.createListeners();
    }
    BaseOptionMetabox.prototype.createListeners = function () {
        var _this = this;
        this.$j("#" + this.getCheckboxId()).change(function () { return _this.onValueChanged(event); });
    };
    BaseOptionMetabox.prototype.onValueChanged = function (event) {
        var hasValue = this.$j("#" + this.getCheckboxId()).is(':checked');
        if (hasValue) {
            this.hasValue = 1;
        }
        else {
            this.hasValue = 0;
        }
        this.updateEditor();
    };
    BaseOptionMetabox.prototype.updateEditor = function () {
        this.$j("#" + this.getEditorId()).val(this.hasValue);
    };
    BaseOptionMetabox.prototype.getCheckboxId = function () {
        return "";
    };
    BaseOptionMetabox.prototype.getEditorId = function () {
        return "";
    };
    return BaseOptionMetabox;
}());
//# sourceMappingURL=BaseOptionMetabox.js.map