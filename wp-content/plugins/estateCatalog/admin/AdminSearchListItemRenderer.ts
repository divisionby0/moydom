///<reference path="../js/EstateListRenderer.ts"/>
declare var siteUrl;
class AdminSearchListItemRenderer extends EstateListRenderer{
    protected createAnchorElement():string{
        var url:string = siteUrl + "/wp-admin/post.php?post="+this.data.id+"&action=edit";
        return "<a href='"+url+"' target='_blank'></a>";
    }

    protected createIdElement():any{
        return this.$j("<div class='col-md-1'>ID:<span class='badge badge-primary'>"+this.data.id+"</span></div>");
    }
}
