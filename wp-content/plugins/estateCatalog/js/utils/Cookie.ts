class Cookie{
    private static estateType:string = "houses";
    private static city:string;
    private static saleType:string;
    private static rentType:string;
    private static costMin:string;
    private static costMax:string;
    private static floorMin:string;
    private static floorMax:string;
    private static rooms:string;
    
    public static setEstateType(value:string):void{
        this.setCookie("estateType", value);
    }
    public static getEstateType():string{
        return this.getCookie("estateType");
    }
    
    public static setCity(value:string):void{
        this.setCookie("city", value);
    }
    public static getCity():string{
        return this.getCookie("city");
    }
    
    public static setSaleType(value:string):void{
        this.setCookie("saleType", value)
    }
    public static getSaleType():string{
        return this.getCookie("saleType");
    }
    
    public static setRentType(value:string):void{
        this.setCookie("rentType", value);
    }
    public static getRentType():string{
        return this.getCookie("rentType");
    }
    
    public static setCostMin(value:string):void{
        this.setCookie("costMin", value);
    }
    public static getCostMin():string{
        return this.getCookie("costMin");
    }
    
    public static setRooms(value:string):void{
        this.setCookie("rooms", value);
    }
    public static getRooms():string{
        return this.getCookie("rooms");
    }
    
    public static setCostMax(value:string):void{
        this.setCookie("costMax", value);
    }
    public static getCostMax():string{
        return this.getCookie("costMax");
    }
    
    public static setFloorMin(value:string):void{
        this.setCookie("floorMin", value);
    }
    public static getFloorMin():string{
        return this.getCookie("floorMin");
    }
    
    public static setFloorMax(value:string):void{
        this.setCookie("floorMax", value);
    }
    public static getFloorMax():string{
        return this.getCookie("floorMax");
    }

    private static setCookie(cname:string, cvalue:string, exdays:number = 365) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    private static getCookie(cname:string):string {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
}
