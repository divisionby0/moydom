///<reference path="../../estates/lib/jqueryTS/jquery.d.ts"/>
class EstateListRenderer{
    private $j;
    private parent:any;
    private data:any;
    private container:any;
    
    constructor(parent:any, data:any){
        this.$j = jQuery.noConflict();
        this.parent = parent;
        this.data = data;

        this.createChildren();
    }

    private createChildren():void{
        var container:any = this.$j("<a href='"+this.data.url+"'></a>");
        this.container = this.$j("<div class='row' style='margin-bottom: 2px; margin-top: 2px;'></div>");
        this.container.appendTo(container);

        container.appendTo(this.parent);

        var dialTypeString:string = "";
        if(this.data.saleDialType == 1){
            dialTypeString+="Продажа ";
        }
        if(this.data.rentDialType == 1){
            if(dialTypeString!=""){
                dialTypeString+="/ Аренда";
            }
            else{
                dialTypeString+="/ Аренда";
            }
        }

        var image:any = this.$j("<div class='col-md-2'><img src='"+this.data.image+"' style='position: relative;' class='img-thumbnail'/></div>");
        image.appendTo(this.container);

        var dialType:any = this.$j("<div  style='position:absolute; width:100%; text-align:center; color: #7eb22e; bottom:0; left:0; background-color:rgba(255, 255, 255, 0.5);'><b>"+dialTypeString+"</b></div>");
        //dialType.appendTo(this.container);
        dialType.appendTo(image);

        var name:any = this.$j("<div class='col-md-6'><b>"+this.data.name+"</b></div>");
        name.appendTo(this.container);

        var cost:any = this.$j("<div class='col-md-2'><b>"+this.data.cost+" руб.</b></div>");
        cost.appendTo(this.container);
    }
}