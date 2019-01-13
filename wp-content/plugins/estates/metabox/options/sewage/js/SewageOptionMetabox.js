var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../../../base/js/BaseMetabox.ts"/>
var SewageOptionMetabox = (function (_super) {
    __extends(SewageOptionMetabox, _super);
    function SewageOptionMetabox() {
        _super.apply(this, arguments);
    }
    SewageOptionMetabox.prototype.getCheckboxId = function () {
        return "sewageOption";
    };
    SewageOptionMetabox.prototype.getEditorId = function () {
        return "sewageOptionEditor";
    };
    return SewageOptionMetabox;
}(BaseMetabox));
//# sourceMappingURL=SewageOptionMetabox.js.map