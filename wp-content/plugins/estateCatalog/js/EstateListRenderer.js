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
        this.container = this.$j("<div class='row' style='margin-bottom: 4px; margin-top: 4px;'></div>");
        this.container.appendTo(container);
        container.appendTo(this.parent);
        var rendererIcon = pluginsUrl + "/estateCatalog/assets/";
        if (this.data.saleDialType == 1 && this.data.rentDialType == 1) {
            rendererIcon += "renderer_rent_sale.png";
        }
        else if (this.data.saleDialType == 1) {
            rendererIcon += "renderer_sale.png";
        }
        else {
            rendererIcon += "renderer_rent.png";
        }
        var estateId = this.$j("<div class='col-md-1'>ID:<span class='badge badge-primary' style='background-color: #405585!important;'>" + this.data.id + "</span></div>");
        estateId.appendTo(this.container);
        var estateDate = this.$j("<div class='col-md-2'>" + this.data.date + "</div>");
        estateDate.appendTo(this.container);
        var image = this.$j("<div class='col-md-2'><img src='" + this.data.image + "' style='position: relative; z-index: 1;' class='img-thumbnail'/></div>");
        image.appendTo(this.container);
        var dialType = this.$j("<img src='" + rendererIcon + "' style='position:absolute; z-index: 1000; top:0;'/>");
        dialType.appendTo(image);
        var name = this.$j("<div class='col-md-5'><div class='row'><b>" + this.data.name + "</b></div></div>");
        name.appendTo(this.container);
        if (this.data.address) {
            var address = this.$j("<div class='row'>" + this.data.address + "</div>");
            address.appendTo(name);
        }
        if (this.data.type == "flats" || this.data.type == "houses") {
            var areaDecorator = this.$j("<div class='row'>S:" + this.data.area + " кв.м.</div>");
            areaDecorator.appendTo(name);
        }
        if (this.data.type == "flats") {
            // floor
            var floorDecorator = this.$j("<div class='row'>Этаж:" + this.data.floor + "/" + this.data.totalFloors + "</div>");
            floorDecorator.appendTo(name);
        }
        if (this.data.type == "houses") {
            // floor
            var areaOutsideDecorator = this.$j("<div class='row'>S участ.:" + this.data.areaOutside + " кв.м.</div>");
            areaOutsideDecorator.appendTo(name);
        }
        var cost = this.$j("<div class='col-md-2'><b>" + this.data.cost + " руб.</b></div>");
        cost.appendTo(this.container);
    };
    return EstateListRenderer;
}());
//# sourceMappingURL=EstateListRenderer.js.map