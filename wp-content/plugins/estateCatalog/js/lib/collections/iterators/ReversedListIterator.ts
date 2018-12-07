///<reference path="../List.ts"/>
class ReversedListIterator{
    private collection:List<any>;
    private counter:number = -1;

    constructor(_collection:List<any>){
        this.collection = _collection;
        this.counter = this.collection.size();
    }

    hasPrev():boolean{
        var prevIndex:number = this.counter-1;
        if(prevIndex >-1){
            return true;
        }
        else{
            return false;
        }
    }

    prev():any{
        this.counter-=1;
        return this.collection.get(this.counter);
    }
}
