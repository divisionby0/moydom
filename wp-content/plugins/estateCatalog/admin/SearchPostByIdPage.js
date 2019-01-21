///<reference path="../js/lib/events/EventBus.ts"/>
///<reference path="../js/service/AjaxServiceEvent.ts"/>
///<reference path="../js/service/Ajax.ts"/>
///<reference path="../js/EstateListRenderer.ts"/>
///<reference path="AdminSearchListItemRenderer.ts"/>
var SearchPostByIdPage = (function () {
    function SearchPostByIdPage(ajax) {
        var _this = this;
        console.log("Im SearchPostByIdPage");
        this.$j = jQuery.noConflict();
        this.ajax = ajax;
        console.log("ajax:", ajax);
        this.input = this.$j("#idInput");
        this.button = this.$j("#serachButton");
        var enabled = this.input.length != 0;
        if (enabled) {
            this.createResponseListeners();
            this.button.on("click", function () { return _this.onSearchButtonClicked(); });
        }
    }
    SearchPostByIdPage.prototype.onSearchButtonClicked = function () {
        this.searchValue = this.input.val();
        if (this.searchValue != "") {
            console.log("searching for " + this.searchValue);
            this.ajax.search(this.searchValue);
        }
    };
    SearchPostByIdPage.prototype.onResponse = function (data) {
        console.log("on response ", data);
        try {
            this.estates = JSON.parse(data);
            console.log("response: ", this.estates);
        }
        catch (error) {
            console.log("error parsing data ", data);
        }
        this.renderCollection();
    };
    SearchPostByIdPage.prototype.renderCollection = function () {
        this.$j("#resultContainer").empty();
        for (var i = 0; i < this.estates.length; i++) {
            var estate = this.estates[i];
            new AdminSearchListItemRenderer(this.$j("#resultContainer"), estate);
        }
    };
    SearchPostByIdPage.prototype.createResponseListeners = function () {
        var _this = this;
        EventBus.addEventListener(AjaxServiceEvent.ON_SEARCH_RESULT, function (data) { return _this.onResponse(data); });
    };
    return SearchPostByIdPage;
}());
//# sourceMappingURL=SearchPostByIdPage.js.map