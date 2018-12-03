class CityMetabox{
    private $j:any;

    constructor(){
        this.$j = jQuery.noConflict();
        console.log("Im CityMetabox j=",this.$j);
        this.$j("#citySelect").change(()=>this.onChanged(event));
    }

    private onChanged(event:any):void{
        console.log("changed");
        this.updateSelection();
    }

    private updateSelection():void{
        var selectedCity:string = this.$j("#citySelect").find(":selected").text();
        this.$j("#selectedCityEditor").val(selectedCity);
    }
}
