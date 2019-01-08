class HotSaleOptionMetabox{
    private $j:any;
    private isHotSale:number = 0;

    constructor(){
        this.$j = jQuery.noConflict();
        console.log("Im hotSaleOption metabox");
        this.createListeners();
    }

    private createListeners():void{
        console.log("Creater listeners");
        this.$j("#hotSaleOption").change(()=>this.onHotSaleOptionChanged(event));
    }

    private onHotSaleOptionChanged(event:any):void{
        var isHotSale:boolean = this.$j("#hotSaleOption").is(':checked');
        if(isHotSale){
            this.isHotSale = 1;
        }
        else{
            this.isHotSale = 0;
        }
        this.updateEditor();
    }

    private updateEditor():void{
        this.$j("#hotSaleOptionEditor").val(this.isHotSale);
    }
}
