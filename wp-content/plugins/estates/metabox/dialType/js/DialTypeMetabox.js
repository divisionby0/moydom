var DialTypeMetabox = (function () {
    function DialTypeMetabox() {
        this.types = new Array();
        this.saleIsEnabled = 0;
        this.rentIsEnabled = 0;
        this.$j = jQuery.noConflict();
        this.parseData();
        this.updateTypes();
        this.updateControls();
        this.updateEditor();
        this.createListeners();
    }
    DialTypeMetabox.prototype.createListeners = function () {
        var _this = this;
        this.$j("#saleType").change(function () { return _this.onSaleTypeChanged(event); });
        this.$j("#rentType").change(function () { return _this.onRentTypeChanged(event); });
    };
    DialTypeMetabox.prototype.onSaleTypeChanged = function (event) {
        var saleIsEnabled = this.$j("#saleType").is(':checked');
        if (saleIsEnabled) {
            this.saleIsEnabled = 1;
        }
        else {
            this.saleIsEnabled = 0;
        }
        this.updateTypes();
        this.updateEditor();
    };
    DialTypeMetabox.prototype.onRentTypeChanged = function (event) {
        var rentIsEnabled = this.$j("#rentType").is(':checked');
        if (rentIsEnabled) {
            this.rentIsEnabled = 1;
        }
        else {
            this.rentIsEnabled = 0;
        }
        this.updateTypes();
        this.updateEditor();
    };
    DialTypeMetabox.prototype.parseData = function () {
        var data = this.$j("#dialTypeEditor").val();
        console.log("sale:", this.$j("#saleTypeEditor").val());
        this.types[0] = parseInt(this.$j("#saleTypeEditor").val());
        this.types[1] = parseInt(this.$j("#rentTypeEditor").val());
        if (isNaN(this.types[0])) {
            this.types[0] = 0;
        }
        if (isNaN(this.types[1])) {
            this.types[1] = 0;
        }
        this.saleIsEnabled = this.types[0];
        this.rentIsEnabled = this.types[1];
        /*
        if(data!=""){
            var rawData:string[] = data.split("");
            this.types[0] = parseInt(rawData[0]);
            this.types[1] = parseInt(rawData[1]);
            this.saleIsEnabled = this.types[0];
            this.rentIsEnabled = this.types[1];
        }
        */
    };
    DialTypeMetabox.prototype.updateTypes = function () {
        this.types[0] = this.saleIsEnabled;
        this.types[1] = this.rentIsEnabled;
    };
    DialTypeMetabox.prototype.updateEditor = function () {
        /*
        var dataString:string = "";
        for(var i:number = 0; i<this.types.length; i++){
            dataString+=this.types[i];
        }
        */
        this.$j("#saleTypeEditor").val(this.types[0]);
        this.$j("#rentTypeEditor").val(this.types[1]);
    };
    DialTypeMetabox.prototype.updateControls = function () {
        if (this.types[0] == 1) {
            this.$j("#saleType").prop('checked', true);
        }
        else {
            this.$j("#saleType").prop('checked', false);
        }
        if (this.types[1] == 1) {
            this.$j("#rentType").prop('checked', true);
        }
        else {
            this.$j("#rentType").prop('checked', false);
        }
    };
    return DialTypeMetabox;
}());
//# sourceMappingURL=DialTypeMetabox.js.map