///<reference path="service/Ajax.ts"/>
///<reference path="Constants.ts"/>
///<reference path="lib/events/EventBus.ts"/>
///<reference path="service/AjaxServiceEvent.ts"/>
///<reference path="EstateListRenderer.ts"/>
///<reference path="utils/DateUtils.ts"/>
///<reference path="utils/Cookie.ts"/>
class Catalog{
    private ajax:Ajax;
    private $j;

    private selectedEstateType:string;
    private selectedCity:string;
    private saleDialType:number = 1;
    private rentDialType:number = 0;
    private costMin:number = 5000;
    private costMax:number = 5000000;

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
        this.selectedEstateType = Cookie.getEstateType();
        this.selectedCity = Cookie.getCity();
        this.saleDialType = Number(Cookie.getSaleType());
        this.rentDialType = Number(Cookie.getRentType());
        this.costMin = Number(Cookie.getCostMin());
        this.costMax = Number(Cookie.getCostMax());
        this.floorMin = Number(Cookie.getFloorMin());
        this.floorMax = Number(Cookie.getFloorMax());

        if(this.costMin == 0){
            this.costMin = 5000;
            Cookie.setCostMin(this.costMin.toString());
        }
        if(this.costMax == 0){
            this.costMax = 5000000;
            Cookie.setCostMin(this.costMax.toString());
        }

        if(this.floorMin == 0){
            this.floorMin = 1;
            Cookie.setFloorMin(this.floorMin.toString());
        }
        if(this.floorMax == 0){
            this.floorMax = 25;
            Cookie.setFloorMax(this.floorMax.toString());
        }

        if(this.saleDialType == 0 && this.rentDialType == 0){
            this.saleDialType = 1;
            this.rentDialType = 1;
            Cookie.setSaleType(String(1));
            Cookie.setRentType(String(1));
        }

        if(this.saleDialType == 1){
            this.$j("#sailType").prop('checked', true);
        }
        else{
            this.$j("#sailType").prop('checked', false);
        }
        if(this.rentDialType == 1){
            this.$j("#rentType").prop('checked', true);
        }
        else{
            this.$j("#rentType").prop('checked', false);
        }

        if(this.selectedCity == undefined || this.selectedCity == "" || this.selectedCity == null){
            this.selectedCity = this.$j("#city");
            this.selectedCity = this.$j("#city option:first").val();
        }
        this.$j("#estateType option[data-type='" + this.selectedEstateType +"']").attr("selected","selected");
        this.$j("#floorMin option[data-value='" + this.floorMin +"']").attr("selected","selected");
        this.$j("#floorMax option[data-value='" + this.floorMax +"']").attr("selected","selected");

        this.$j("#costMin option[data-value='" + this.costMin +"']").attr("selected","selected");
        this.$j("#costMax option[data-value='" + this.costMax +"']").attr("selected","selected");

        this.$j("#city").val(this.selectedCity);

        if(this.selectedEstateType == "flats"){
            this.$j("#floorNumberContainer").show();
        }
        else{
            this.$j("#floorNumberContainer").hide();
        }
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
        Cookie.setCity(this.selectedCity);
        this.createRequest();
    }

    private onEstateTypeChanged():void{
        this.selectedEstateType = this.$j("#estateType").find(":selected").data("type");
        Cookie.setEstateType(this.selectedEstateType);
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
        Cookie.setFloorMin(this.floorMin.toString());
        this.createRequest();
    }
    private onFloorMaxChanged():void{
        this.floorMax = this.$j("#floorMax").find(":selected").data("value");
        Cookie.setFloorMax(this.floorMax.toString());
        this.createRequest();
    }
    
    private onCostMinChanged():void{
        this.costMin = this.$j("#costMin").find(":selected").data("value");
        Cookie.setCostMin(this.costMin.toString());
        this.createRequest();
    }
    private onCostMaxChanged():void{
        this.costMax = this.$j("#costMax").find(":selected").data("value");
        Cookie.setCostMax(this.costMax.toString());
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

        Cookie.setSaleType(this.saleDialType.toString());
        
        this.createRequest();
    }

    private onRentDialTypeChanged():void {
        if(this.$j("#rentType").is(':checked')){
            this.rentDialType = 1;
        }
        else{
            this.rentDialType = 0;
        }
        Cookie.setRentType(this.rentDialType.toString());
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
