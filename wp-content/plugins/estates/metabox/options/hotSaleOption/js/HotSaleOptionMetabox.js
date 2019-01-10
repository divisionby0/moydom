var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../base/js/BaseOptionMetabox.ts"/>
var HotSaleOptionMetabox = (function (_super) {
    __extends(HotSaleOptionMetabox, _super);
    function HotSaleOptionMetabox() {
        _super.apply(this, arguments);
    }
    HotSaleOptionMetabox.prototype.getCheckboxId = function () {
        return "hotSaleOption";
    };
    HotSaleOptionMetabox.prototype.getEditorId = function () {
        return "hotSaleOptionEditor";
    };
    return HotSaleOptionMetabox;
}(BaseOptionMetabox));
//# sourceMappingURL=HotSaleOptionMetabox.js.map