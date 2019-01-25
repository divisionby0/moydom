///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
///<reference path="utils/DateUtils.ts"/>
class Catalog{
    private ajax:Ajax;
    private $j;

    private selectedEstateType:string;
    private selectedCity:string;
    private saleDialType:number = 1;
    private rentDialType:number = 0;
    private costMin:number = 0;
    private costMax:number = 150000000;

    private floorMin:number = 0;
    private floorMax:number = 25;

    private estates:any[];

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
        console.log("createUIListeners estateType=",this.$j("#estateType"));
        this.$j("#estateType").change(()=>this.onEstateTypeChanged());
        this.$j("#city").change(()=>this.onCityChanged());
        this.$j("#sailType").change(()=>this.onSaleDialTypeChanged());
        this.$j("#rentType").change(()=>this.onRentDialTypeChanged());
        this.$j("#costMin").change(()=>this.onCostMinChanged());
        this.$j("#costMax").change(()=>this.onCostMaxChanged());
        this.$j("#dateSort").click((event)=>this.onDateSortClicked(event));
        this.$j("#costSort").click((event)=>this.onCostSortClicked(event));

        this.$j("#floorMin").change(()=>this.onFloorMinChanged());
        this.$j("#floorMax").change(()=>this.onFloorMaxChanged());
    }

    private onDateSortClicked(event:any):boolean{
        event.preventDefault();
        this.$j("#estatesListContainer").empty();
        this.estates.sort(this.sortByDate);
        this.renderCollection();
        return false;
    }
    private onCostSortClicked(event:any):boolean{
        event.preventDefault();
        this.$j("#estatesListContainer").empty();
        this.estates.sort(this.sortByCost);
        this.renderCollection();
        return false;
    }

    private onCityChanged():void{
        this.selectedCity = this.$j("#city").find(":selected").text();
        this.createRequest();
    }

    private onEstateTypeChanged():void{
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        if(this.selectedEstateType == "flats"){
            this.$j("#floorNumberContainer").show();
        }
        else{
            this.$j("#floorNumberContainer").hide();
        }
        this.createRequest();
    }
    
    private onFloorMinChanged():void{
        this.floorMin = this.$j("#floorMin").find(":selected").data("value");
        this.createRequest();
    }
    private onFloorMaxChanged():void{
        this.floorMax = this.$j("#floorMax").find(":selected").data("value");
        this.createRequest();
    }
    
    private onCostMinChanged():void{
        this.costMin = this.$j("#costMin").find(":selected").data("value");
        this.createRequest();
    }
    private onCostMaxChanged():void{
        this.costMax = this.$j("#costMax").find(":selected").data("value");
        this.createRequest();
    }

    private createRequest():void{
        console.log("creating request estateType:"+this.selectedEstateType+"  saleDialType="+this.saleDialType+"  rent="+this.rentDialType+" city:"+this.selectedCity+" costMin="+this.costMin+"  costMax="+this.costMax+"  floorMin="+this.floorMin+"  floorMax="+this.floorMax);
        this.ajax.getEstates(this.selectedEstateType, this.saleDialType, this.rentDialType, this.selectedCity, this.costMin, this.costMax, this.floorMin, this.floorMax);
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
            this.estates = JSON.parse(data);
            console.log("response: ",this.estates);
        }
        catch(error){
            console.log("error parsing data ",data);
        }
        this.renderCollection();
    }
    
    private renderCollection():void{
        this.$j("#estatesListContainer").empty();
        
        for(var i:number = 0; i<this.estates.length; i++){
            var estate:any = this.estates[i];
            new EstateListRenderer(this.$j("#estatesListContainer"), estate);
        }
    }

    private sortByCost(a:any, b:any):number{
        if (a.cost < b.cost)
            return -1;
        if (a.cost > b.cost)
            return 1;
        return 0;
    }
    private sortByDate(a:any, b:any):number{
        if (DateUtils.toTimestamp(a.date) < DateUtils.toTimestamp(b.date))
            return -1;
        if (DateUtils.toTimestamp(a.date) > DateUtils.toTimestamp(b.date))
            return 1;
        return 0;
    }
    

    private createResponseListeners():void {
        EventBus.addEventListener(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE,(data)=>this.onResponse(data));
    }
}
