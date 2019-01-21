///<reference path="../lib/events/EventBus.ts"/>
///<reference path="AjaxServiceEvent.ts"/>
declare var jQuery:any;
declare var ajaxurl:string;
class Ajax{
    private j:any;

    constructor(){
        this.j = jQuery.noConflict();
    }
    
    public search(value:string):void{
        var data:any = {'action':'searchForEstate',
            'id':value
        };
        this.j.post(ajaxurl, data, (response) => this.onSearchEstatesResponse(response));
    }
    
    public getEstates(estateType:string, saleDialType:number, rentDialType:number, city:string, costMin:number, costMax:number, floorMin:number, floorMax:number):void{
        var data:any = {'action':'getEstates',
            'estateType':estateType,
            'saleDialType':saleDialType,
            'rentDialType':rentDialType,
            'costMin':costMin,
            'costMax':costMax,
            'floorMin':floorMin,
            'floorMax':floorMax,
            'city':city
        };
        this.j.post(ajaxurl, data, (response) => this.onFilteredEstatesResponse(response));
    }
    
    private onFilteredEstatesResponse(response:any):void{
        EventBus.dispatchEvent(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, response);
    }
    
    private onSearchEstatesResponse(response:any):void{
        EventBus.dispatchEvent(AjaxServiceEvent.ON_SEARCH_RESULT, response);
    }
}
