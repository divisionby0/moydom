var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../base/js/BaseOptionMetabox.ts"/>
var InternetOptionMetabox = (function (_super) {
    __extends(InternetOptionMetabox, _super);
    function InternetOptionMetabox() {
        _super.apply(this, arguments);
    }
    InternetOptionMetabox.prototype.getCheckboxId = function () {
        return "internetOption";
    };
    InternetOptionMetabox.prototype.getEditorId = function () {
        return "internetOptionEditor";
    };
    return InternetOptionMetabox;
}(BaseOptionMetabox));
//# sourceMappingURL=InternetOptionMetabox.js.map