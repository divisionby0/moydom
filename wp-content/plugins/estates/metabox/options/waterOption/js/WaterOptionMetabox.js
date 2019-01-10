var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../base/js/BaseOptionMetabox.ts"/>
var WaterOptionMetabox = (function (_super) {
    __extends(WaterOptionMetabox, _super);
    function WaterOptionMetabox() {
        _super.apply(this, arguments);
    }
    WaterOptionMetabox.prototype.getCheckboxId = function () {
        return "waterOption";
    };
    WaterOptionMetabox.prototype.getEditorId = function () {
        return "waterOptionEditor";
    };
    return WaterOptionMetabox;
}(BaseOptionMetabox));
//# sourceMappingURL=WaterOptionMetabox.js.map