class Card{
    private $j;
    constructor(){
        this.$j = jQuery.noConflict();
        //var productId:string = this.$j("input[name='requestData']");
        var productId:string = this.$j("#productId']").text();
        console.log("product id: "+productId);
    }
}
