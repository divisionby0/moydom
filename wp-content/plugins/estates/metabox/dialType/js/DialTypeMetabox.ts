class DialTypeMetabox{

    private $j:any;
    private types:number[] = new Array();

    private saleIsEnabled:number = 0;
    private rentIsEnabled:number = 0;

    constructor(){
        this.$j = jQuery.noConflict();
        this.parseData();
        this.updateTypes();
        this.updateControls();
        this.updateEditor();
        this.createListeners();
    }

    private createListeners():void{
        this.$j("#saleType").change(()=>this.onSaleTypeChanged(event));
        this.$j("#rentType").change(()=>this.onRentTypeChanged(event));
    }

    private onSaleTypeChanged(event:any):void{
        var saleIsEnabled:boolean = this.$j("#saleType").is(':checked');
        if(saleIsEnabled){
            this.saleIsEnabled = 1;
        }
        else{
            this.saleIsEnabled = 0;
        }
        this.updateTypes();
        this.updateEditor();
    }
    private onRentTypeChanged(event:any):void{
        var rentIsEnabled:boolean = this.$j("#rentType").is(':checked');
        if(rentIsEnabled){
            this.rentIsEnabled = 1;
        }
        else{
            this.rentIsEnabled = 0;
        }
        this.updateTypes();
        this.updateEditor();
    }

    private parseData():void{
        var data:string = this.$j("#dialTypeEditor").val();

        console.log("sale:",this.$j("#saleTypeEditor").val());

        this.types[0] = parseInt(this.$j("#saleTypeEditor").val());
        this.types[1] = parseInt(this.$j("#rentTypeEditor").val());

        if(isNaN(this.types[0])){
            this.types[0] = 0;
        }
        if(isNaN(this.types[1])){
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
    }

    private updateTypes():void{
        this.types[0] = this.saleIsEnabled;
        this.types[1] = this.rentIsEnabled;
    }

    private updateEditor():void{
        /*
        var dataString:string = "";
        for(var i:number = 0; i<this.types.length; i++){
            dataString+=this.types[i];
        }
        */
        this.$j("#saleTypeEditor").val(this.types[0]);
        this.$j("#rentTypeEditor").val(this.types[1]);
    }

    private updateControls():void {
        if(this.types[0]==1){
            this.$j("#saleType").prop('checked', true);
        }
        else{
            this.$j("#saleType").prop('checked', false);
        }
        
        if(this.types[1]==1){
            this.$j("#rentType").prop('checked', true);
        }
        else{
            this.$j("#rentType").prop('checked', false);
        }
    }
}
