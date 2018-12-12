///<reference path="../../estates/lib/jqueryTS/jquery.d.ts"/>
var EstateListRenderer = (function () {
    function EstateListRenderer(parent, data) {
        this.$j = jQuery.noConflict();
        this.parent = parent;
        this.data = data;
        this.createChildren();
    }
    EstateListRenderer.prototype.createChildren = function () {
        var container = this.$j("<a href='" + this.data.url + "'></a>");
        this.container = this.$j("<div class='row' style='margin-bottom: 2px; margin-top: 2px;'></div>");
        this.container.appendTo(container);
        container.appendTo(this.parent);
        var dialTypeString = "";
        if (this.data.saleDialType == 1) {
            dialTypeString += "Продажа ";
        }
        if (this.data.rentDialType == 1) {
            if (dialTypeString != "") {
                dialTypeString += "/ Аренда";
            }
            else {
                dialTypeString += "/ Аренда";
            }
        }
        var image = this.$j("<div class='col-md-2'><img src='" + this.data.image + "' style='position: relative;' class='img-thumbnail'/></div>");
        image.appendTo(this.container);
        var dialType = this.$j("<div  style='position:absolute; width:100%; text-align:center; color: #7eb22e; bottom:0; left:0; background-color:rgba(255, 255, 255, 0.5);'><b>" + dialTypeString + "</b></div>");
        //dialType.appendTo(this.container);
        dialType.appendTo(image);
        var name = this.$j("<div class='col-md-6'><b>" + this.data.name + "</b></div>");
        name.appendTo(this.container);
        var cost = this.$j("<div class='col-md-2'><b>" + this.data.cost + " руб.</b></div>");
        cost.appendTo(this.container);
    };
    return EstateListRenderer;
}());
//# sourceMappingURL=EstateListRenderer.js.map