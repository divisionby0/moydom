///<reference path="../js/lib/events/EventBus.ts"/>
///<reference path="../js/service/AjaxServiceEvent.ts"/>
///<reference path="../js/service/Ajax.ts"/>
///<reference path="../js/EstateListRenderer.ts"/>
///<reference path="AdminSearchListItemRenderer.ts"/>
class SearchPostByIdPage{
    private $j;
    private input:any;
    private button:any;
    private searchValue:string;
    private ajax:Ajax;
    private estates:any[];

    constructor(ajax:Ajax){
        console.log("Im SearchPostByIdPage");
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        console.log("ajax:",ajax);

        this.input = this.$j("#idInput");
        this.button = this.$j("#serachButton");
        var enabled:boolean = this.input.length!=0;
        if(enabled){
            this.createResponseListeners();
            this.button.on("click", ()=>this.onSearchButtonClicked());
        }
    }

    private onSearchButtonClicked():void{
        this.searchValue = this.input.val();
        if(this.searchValue!=""){
            console.log("searching for "+this.searchValue);
            this.ajax.search(this.searchValue);
        }
    }

    private onResponse(data:string):void{
        console.log("on response ",data);

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
        this.$j("#resultContainer").empty();

        for(var i:number = 0; i<this.estates.length; i++){
            var estate:any = this.estates[i];
            new AdminSearchListItemRenderer(this.$j("#resultContainer"), estate);
        }
    }

    private createResponseListeners():void {
        EventBus.addEventListener(AjaxServiceEvent.ON_SEARCH_RESULT,(data)=>this.onResponse(data));
    }
}


