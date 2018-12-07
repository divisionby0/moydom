///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
class Catalog{
    private ajax:Ajax;
    private $j;

    private selectedEstateType:string;
    private selectedCity:string;

    constructor(ajax:Ajax){
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        this.setDefaults();
        this.createUIListeners();
        this.createRequest();
    }

    private setDefaults():void{
        this.selectedEstateType = Constants.HOUSES;
        this.selectedCity = this.$j("#city").find(":selected").text();
    }

    private createUIListeners():void{
        this.$j("#estateType").change(()=>this.onEstateTypeChanged());
        this.$j("#city").change(()=>this.onCityChanged());
    }

    private onCityChanged():void{
        this.selectedCity = this.$j("#city").find(":selected").text();
        this.createRequest();
    }

    private onEstateTypeChanged():void{
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        this.createRequest();
    }

    private createRequest():void{
        this.ajax.getEstates(this.selectedEstateType, new Array(), this.selectedCity);
    }
}
