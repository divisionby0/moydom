class BaseOptionMetabox{
    protected $j:any;
    protected hasValue:number = 0;

    constructor(){
        this.$j = jQuery.noConflict();
        this.createListeners();
    }

    private createListeners():void{
        this.$j("#"+this.getCheckboxId()).change(()=>this.onValueChanged(event));
    }

    private onValueChanged(event:any):void{
        var hasValue:boolean = this.$j("#"+this.getCheckboxId()).is(':checked');
        if(hasValue){
            this.hasValue = 1;
        }
        else{
            this.hasValue = 0;
        }
        this.updateEditor();
    }

    private updateEditor():void{
        this.$j("#"+this.getEditorId()).val(this.hasValue);
    }
    protected getCheckboxId():string{
        return "";
    } 
    protected getEditorId():string{
        return "";
    } 
}
