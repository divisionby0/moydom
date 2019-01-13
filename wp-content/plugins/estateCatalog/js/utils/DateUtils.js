var DateUtils = (function () {
    function DateUtils() {
    }
    DateUtils.toTimestamp = function (strDate) {
        var datum = Date.parse(strDate);
        return datum / 1000;
    };
    return DateUtils;
}());
//# sourceMappingURL=DateUtils.js.map