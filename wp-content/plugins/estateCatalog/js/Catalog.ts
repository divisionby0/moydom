///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
class Catalog{
    private ajax:Ajax;
    private $j;

    private selectedEstateType:string;
    private selectedCity:string;
    private saleDialType:number = 1;
    private rentDialType:number = 0;
    private costMin:number = 0;
    private costMax:number = 9000000;

    constructor(ajax:Ajax){
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        this.setDefaults();
        this.createUIListeners();
        this.createResponseListeners();
        this.createRequest();
    }

    private setDefaults():void{
        this.selectedEstateType = Constants.HOUSES;
        this.selectedCity = this.$j("#city").find(":selected").text();
    }

    private createUIListeners():void{
        this.$j("#estateType").change(()=>this.onEstateTypeChanged());
        this.$j("#city").change(()=>this.onCityChanged());
        this.$j("#sailType").change(()=>this.onSaleDialTypeChanged());
        this.$j("#rentType").change(()=>this.onRentDialTypeChanged());
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
        this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax);
    }

    private onSaleDialTypeChanged():void {
        if(this.$j("#sailType").is(':checked')){
            this.saleDialType = 1;
        }
        else{
            this.saleDialType = 0;
        }
        this.createRequest();
    }

    private onRentDialTypeChanged():void {
        if(this.$j("#rentType").is(':checked')){
            this.rentDialType = 1;
        }
        else{
            this.rentDialType = 0;
        }
        this.createRequest();
    }

    private onResponse(data:string):void{
        try{
            var estates:any[] = JSON.parse(data);
            console.log("response: ",estates);
            this.renderCollection(estates);
        }
        catch(error){
            console.log("error parsing data ",data);
        }
    }
    
    private renderCollection(collection:any[]):void{
        this.$j("#estatesListContainer").empty();
        
        for(var i:number = 0; i<collection.length; i++){
            var estate:any = collection[i];
            new EstateListRenderer(this.$j("#estatesListContainer"), estate);
        }
    }

    private createResponseListeners():void {
        EventBus.addEventListener(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE,(data)=>this.onResponse(data));
    }
}
