/// <reference path="iterators/ListIterator.ts"/>
///<reference path="iterators/ReversedListIterator.ts"/>

class List<T> {
    private id:string;
    private items: Array<T>;


    constructor(id) {
        if(id){
            this.id = id;
        }
        this.items = [];
    }

    size(): number {
        return this.items.length;
    }

    add(value: T): void {
        this.items.push(value);
    }

    get(index: number): T {
        return this.items[index];
    }
    remove(index: number):void{
        this.items.splice(index,1);
    }
    
    removeByValue(value:number):boolean{
        var result:boolean = false;
        var index:number = -1;
        for(var i:number = 0;i < this.size(); i++){
            var currentItem:any = this.items[i];
            if(parseInt(currentItem) === value){
                index = i;
                break;
            }
        }
        
        if(index != -1){
            result = true;
            this.remove(index);
        }
        return result;
    }
    findIndex(value:number):any{
        var returnValue:number = -1;
        for(var i:number = 0;i < this.size(); i++){
            var currentItem:any = this.items[i];
            if(currentItem === value){
                returnValue = i;
                break;
            }
        }
        return returnValue;
    }
    has(value:number):boolean{
        return this.findIndex(value)!=-1;
    }
    clear():void{
        this.items = [];
    }
    getIterator():ListIterator{
        return new ListIterator(this);
    }
    getReversedIterator():ReversedListIterator{
        return new ReversedListIterator(this);
    }
    setId(id:string):void{
        this.id = id;
    }
    getId():string{
        return this.id;
    }
}
