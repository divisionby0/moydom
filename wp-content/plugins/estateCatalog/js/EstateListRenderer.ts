///<reference path="../../estates/lib/jqueryTS/jquery.d.ts"/>
declare var pluginsUrl;
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
        this.container = this.$j("<div class='row' style='margin-bottom: 4px; margin-top: 4px;'></div>");
        this.container.appendTo(container);

        container.appendTo(this.parent);
        
        var rendererIcon:string = pluginsUrl+"/estateCatalog/assets/";
        if(this.data.saleDialType == 1 && this.data.rentDialType == 1){
            rendererIcon+="renderer_rent_sale.png";
        }
        else if(this.data.saleDialType == 1){
            rendererIcon+="renderer_sale.png";
        }
        else{
            rendererIcon+="renderer_rent.png";
        }

        var estateId:any = this.$j("<div class='col-md-1'>ID:<span class='badge badge-primary' style='background-color: #405585!important;'>"+this.data.id+"</span></div>");
        estateId.appendTo(this.container);

        var estateDate:any = this.$j("<div class='col-md-2'>"+this.data.date+"</div>");
        estateDate.appendTo(this.container);

        var image:any = this.$j("<div class='col-md-2'><img src='"+this.data.image+"' style='position: relative; z-index: 1;' class='img-thumbnail'/></div>");
        image.appendTo(this.container);

        var dialType:any = this.$j("<img src='"+rendererIcon+"' style='position:absolute; z-index: 1000; top:0;'/>");
        dialType.appendTo(image);

        var name:any = this.$j("<div class='col-md-5'><b>"+this.data.name+"</b></div>");
        name.appendTo(this.container);

        var cost:any = this.$j("<div class='col-md-2'><b>"+this.data.cost+" руб.</b></div>");
        cost.appendTo(this.container);
    }
}