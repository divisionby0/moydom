var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../../base/js/BaseMetabox.ts"/>
var GasOptionMetabox = (function (_super) {
    __extends(GasOptionMetabox, _super);
    function GasOptionMetabox() {
        _super.apply(this, arguments);
    }
    GasOptionMetabox.prototype.getCheckboxId = function () {
        return "gasOption";
    };
    GasOptionMetabox.prototype.getEditorId = function () {
        return "gasOptionEditor";
    };
    return GasOptionMetabox;
}(BaseMetabox));
//# sourceMappingURL=GasOptionMetabox.js.map