var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../base/js/BaseOptionMetabox.ts"/>
var FreeParkingOptionMetabox = (function (_super) {
    __extends(FreeParkingOptionMetabox, _super);
    function FreeParkingOptionMetabox() {
        _super.apply(this, arguments);
    }
    FreeParkingOptionMetabox.prototype.getCheckboxId = function () {
        return "freeParkingOption";
    };
    FreeParkingOptionMetabox.prototype.getEditorId = function () {
        return "freeParkingOptionEditor";
    };
    return FreeParkingOptionMetabox;
}(BaseOptionMetabox));
//# sourceMappingURL=FreeParkingOptionMetabox.js.map