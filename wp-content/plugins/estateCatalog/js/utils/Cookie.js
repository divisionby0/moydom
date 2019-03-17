var Cookie = (function () {
    function Cookie() {
    }
    Cookie.setEstateType = function (value) {
        this.setCookie("estateType", value);
    };
    Cookie.getEstateType = function () {
        return this.getCookie("estateType");
    };
    Cookie.setCity = function (value) {
        this.setCookie("city", value);
    };
    Cookie.getCity = function () {
        return this.getCookie("city");
    };
    Cookie.setSaleType = function (value) {
        this.setCookie("saleType", value);
    };
    Cookie.getSaleType = function () {
        return this.getCookie("saleType");
    };
    Cookie.setRentType = function (value) {
        this.setCookie("rentType", value);
    };
    Cookie.getRentType = function () {
        return this.getCookie("rentType");
    };
    Cookie.setCostMin = function (value) {
        this.setCookie("costMin", value);
    };
    Cookie.getCostMin = function () {
        return this.getCookie("costMin");
    };
    Cookie.setCostMax = function (value) {
        this.setCookie("costMax", value);
    };
    Cookie.getCostMax = function () {
        return this.getCookie("costMax");
    };
    Cookie.setFloorMin = function (value) {
        this.setCookie("floorMin", value);
    };
    Cookie.getFloorMin = function () {
        return this.getCookie("floorMin");
    };
    Cookie.setFloorMax = function (value) {
        this.setCookie("floorMax", value);
    };
    Cookie.getFloorMax = function () {
        return this.getCookie("floorMax");
    };
    Cookie.setCookie = function (cname, cvalue, exdays) {
        if (exdays === void 0) { exdays = 365; }
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    };
    Cookie.getCookie = function (cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    };
    Cookie.estateType = "houses";
    return Cookie;
}());
//# sourceMappingURL=Cookie.js.map