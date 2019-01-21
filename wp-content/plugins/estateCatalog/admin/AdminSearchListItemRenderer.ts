///<reference path="../js/EstateListRenderer.ts"/>
declare var siteUrl;
class AdminSearchListItemRenderer extends EstateListRenderer{
    protected createAnchorElement():string{
        console.log("siteUrl="+siteUrl);
        var url:string = siteUrl + "/wp-admin/post.php?post="+this.data.id+"&action=edit";
        return "<a href='"+url+"' target='_blank'></a>";
    }
}
