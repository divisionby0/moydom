var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../../base/js/BaseMetabox.ts"/>
var ElectricityOptionMetabox = (function (_super) {
    __extends(ElectricityOptionMetabox, _super);
    function ElectricityOptionMetabox() {
        _super.apply(this, arguments);
    }
    ElectricityOptionMetabox.prototype.getCheckboxId = function () {
        return "electricityOption";
    };
    ElectricityOptionMetabox.prototype.getEditorId = function () {
        return "electricityOptionEditor";
    };
    return ElectricityOptionMetabox;
}(BaseMetabox));
//# sourceMappingURL=ElectricityOptionMetabox.js.map