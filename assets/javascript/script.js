// console.log()
// document.querySelector('#app').oncontextmenu = function(event) {
//     event.preventDefault();
//     event.stopPropagation();
// };
document.querySelectorAll('img').forEach(img => {
    img.setAttribute('draggable', 'false')

})
function maxLengthCheck(object)
{
if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
}







const app = new Vue({
    el: '#app',
    data: {
        lists: [],
        curList: {'list_name': '', 'id':'0', 'color': 'blue', 'items': []},
        newItem: {'name': '', 'quantity': null, 'options':[]},
        
        newList: '',
        adding: false,
        timer: null,
        deleteCheckedState: false,
        
        
    },
    methods: {
        /* Method for deleting whole list */
        async deleteList(list, index, event) {
            event.stopPropagation();
            Swal.fire({
                text: `Naozaj chcete vymazať ${list.list_name}`,
                icon: 'warning',
                iconColor: 'rgb(185, 185, 185)',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vymazať!',
                cancelButtonText: 'Zrušiť',
              }).then((result) => {
                    if(result.isConfirmed){
                        axios.delete(`http://shoppinglist.test/api/lists/${list.id}`);
                        this.lists.splice(index, 1);
                    }
              });
        },
        /* Methods fo changing and adding list */
        async addNewList(e) {
            this.adding = true;    
            this.changeList({'list_name':'', 'color':'blue', 'items':[]}, this.lists.length, e);
            
            
        },
        async changeList(list, index, e) {
            e.stopPropagation();
            this.newList = list.list_name;
            document.querySelector(`#${list.color}`).click();
            this.curList = list;
            this.curList.index = index;

            this.$refs.pridatZoznamButton.classList.add('pridat-zoznam-button-active');
            this.$refs.pridatZoznamWrapper.classList.add('pridat-zoznam-active');
        },
        async changeListConfirm() {
            if(this.newList == '') {
                this.newList ='Nákupný zoznam';
            }
            if(this.adding) {
                let newList = await axios.post(`http://shoppinglist.test/api/lists`, {
                    color: document.querySelector('input[name="farba"]:checked').value,
                    list_name: this.newList,
                });  
                newList.data.items = [];
                this.curList = newList.data;
                this.lists.push(newList.data);
                this.changeListItems(this.curList);
            }
            else{
                axios.patch(`http://shoppinglist.test/api/lists/${this.curList.id}`, {
                    color: document.querySelector('input[name="farba"]:checked').value,
                    list_name: this.newList,
                });  
                this.lists[this.curList.index].list_name = this.newList;
                this.lists[this.curList.index].color = document.querySelector('input[name="farba"]:checked').value;
            }
            
            this.changeListCancel();
            
        },
        async changeListCancel() {
            this.$refs.pridatZoznamButton.classList.remove('pridat-zoznam-button-active');
            this.$refs.pridatZoznamWrapper.classList.remove('pridat-zoznam-active');
            this.adding = false;

        },
       
        async changeListItems(list){
            this.curList = list;
            this.$refs.zoznamZoznamov.classList.add('zoznam-active');
            
            this.checkChecked();
            

        },
        /* Back to lists */
        async backToLists() {
            this.$refs.zoznamZoznamov.classList.remove('zoznam-active');
            
        },
        async deleteAll() {
            if(this.curList.items.length != 0) {
                Swal.fire({
                    text: `Naozaj chcete vyprazdniť celý zoznam?`,
                    icon: 'warning',
                    iconColor: 'rgb(185, 185, 185)',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vymazať!',
                    cancelButtonText: 'Zrušiť',
                }).then(async (result) => {
                        if(result.isConfirmed){
                            axios.delete(`http://shoppinglist.test/api/lists/${this.curList.id}/items`)
                            this.curList.items = [];
                        }
                })
            }
        },
        async addNewItem() {
            this.$refs.type.value = "Ks";
            
            this.$refs.pridatPolozkuWrapper.classList.add('pridat-polozku-active');
            this.$refs.pridatPolozkuButton.classList.add('pridat-zoznam-button-active');

        },
        async addNewItemConfirm(){
            if(this.newItem.name == '') {
                this.$refs.novaPolozka.classList.add('required');
                return;

            }
            if(this.newItem.quantity == null){
                this.newItem.quantity = 1;
            }
            axios.post(`http://shoppinglist.test/api/lists/items`,{
                name: this.newItem.name,
                quantity: parseInt(this.newItem.quantity),
                type: this.$refs.type.value,
                completed: false,
                shopping_list_id: this.curList.id,
                
            })
            .then((response) => this.curList.items.push(response.data))
            .catch((error) => console.log(error));

            axios.post(`http://shoppinglist.test/api/all-items`,{
                name: this.newItem.name
            });
            // this.curList.items.push(newItem.data);
            this.addNewItemCancel();
        
        },
        async addNewItemCancel(){
            this.$refs.pridatPolozkuButton.classList.remove('pridat-zoznam-button-active');
            this.$refs.pridatPolozkuWrapper.classList.remove('pridat-polozku-active');
            this.newItem =  {name: '', quantity: null, options:[]}
            this.$refs.novaPolozka.classList.remove('required');

        },
        async stepUp(item, element) {
            element.stopPropagation();
            if(item.completed == 1) return;

            element.path[1].querySelector('input[type=number]').stepUp()
            this.timer = setInterval(function(){
                element.path[1].querySelector('input[type=number]').stepUp()
            }, 100);  
        },
        async stepDown(item, element) {
            element.stopPropagation();
            if(item.completed == 1) return;
            element.path[1].querySelector('input[type=number]').stepDown()

            this.timer = setInterval(function(){
                element.path[1].querySelector('input[type=number]').stepDown()
            }, 100);
        },
        async stepEnd(item, element) {
            clearInterval(this.timer)
            axios.patch(`http://shoppinglist.test/api/lists/items/${item.id}`, {
                quantity: element.path[1].querySelector('input[type=number]').value
            });
        },
        async checkItem(item) {
            
            axios.patch(`http://shoppinglist.test/api/lists/items/${item.id}`, {
                completed: item.completed == 0 ? true: false
            });
            item.completed = item.completed == 0 ? 1 : 0;
            this.checkChecked();
        },
        async deleteChecked() {
            let items = [...this.curList.items];
            items.forEach(item => {
                if(item.completed == 1) {
                    axios.delete(`http://shoppinglist.test/api/lists/items/${item.id}`);
                    this.curList.items.splice(this.curList.items.indexOf(item), 1)

                }
                
            });
            this.checkChecked();
        },
        async checkChecked() {
            this.deleteCheckedState = false;

            this.curList.items.forEach(item => {
                if(item.completed == "1") {
                    this.deleteCheckedState = true;
                }
                
            });
        },
        async getOptions() {
            this.newItem.name = this.newItem.name.charAt(0).toUpperCase() + this.newItem.name.slice(1)

            if(this.newItem.name == "") {
                this.newItem.options = [];
                return;

            }
            axios.get(`http://shoppinglist.test/api/all-items/${this.newItem.name}`)
            .then((response) => {
                
                this.newItem.options = response.data
               
            }).catch((error) => console.log(error));
            
        },
        async chooseOption(option) {
            this.newItem.name = option.name;
            this.newItem.options = [];
        },
        async deleteOption(option, e) {
            e.stopPropagation();
            axios.delete(`http://shoppinglist.test/api/all-items/${option.id}`)
            .then(() => {
                
                this.getOptions();
               
            }).catch((error) => console.log(error));
        },
        async onEnter() {
           this.$refs.quantity.focus();
        },
        


          
    },
    mounted: 
        async function() {
            axios.get(`http://shoppinglist.test/api/lists`)
            .then((response) => this.lists = response.data)
            .catch((error) => console.log(error));
            
    },
})