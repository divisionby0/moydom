var __extends = (this && this.__extends) || function (d, b) {
    for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p];
    function __() { this.constructor = d; }
    d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
};
///<reference path="../js/EstateListRenderer.ts"/>
var AdminSearchListItemRenderer = (function (_super) {
    __extends(AdminSearchListItemRenderer, _super);
    function AdminSearchListItemRenderer() {
        _super.apply(this, arguments);
    }
    AdminSearchListItemRenderer.prototype.createAnchorElement = function () {
        var url = siteUrl + "/wp-admin/post.php?post=" + this.data.id + "&action=edit";
        return "<a href='" + url + "' target='_blank'></a>";
    };
    AdminSearchListItemRenderer.prototype.createIdElement = function () {
        return this.$j("<div class='col-md-1'>ID:<span class='badge badge-primary'>" + this.data.id + "</span></div>");
    };
    return AdminSearchListItemRenderer;
}(EstateListRenderer));
//# sourceMappingURL=AdminSearchListItemRenderer.js.map