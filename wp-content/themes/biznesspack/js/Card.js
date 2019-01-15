var Card = (function () {
    function Card() {
        this.$j = jQuery.noConflict();
        //var productId:string = this.$j("input[name='requestData']");
        var productId = this.$j("#productId']").text();
        console.log("product id: " + productId);
    }
    return Card;
}());
//# sourceMappingURL=Card.js.map