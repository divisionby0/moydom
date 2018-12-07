///<reference path="../lib/events/EventBus.ts"/>
///<reference path="AjaxServiceEvent.ts"/>
declare var jQuery:any;
declare var ajaxurl:string;
class Ajax{
    private j:any;

    constructor(){
        this.j = jQuery.noConflict();
    }
    
    public getEstates(estateType:string, dialTypeCollection:string[], city:string):void{
        var data:any = {'action':'getEstates',
            'estateType':estateType,
            'dialTypeCollection':dialTypeCollection,
            'city':city
        };
        this.j.post(ajaxurl, data, (response) => this.onFilteredEstatesResponse(response));
    }
    
    private onFilteredEstatesResponse(response:any):void{
        console.log("onFilteredEstatesResponse: ",response);
        EventBus.dispatchEvent(AjaxServiceEvent.ON_ESTATES_LOAD_COMPLETE, response);
    }
}
