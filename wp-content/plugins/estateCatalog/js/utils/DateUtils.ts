class DateUtils{
    public static toTimestamp(strDate:string):number{
        var datum:number = Date.parse(strDate);
        return datum/1000;
    }
}
