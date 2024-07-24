<script>
import axios from 'axios';

export default {

    props: {
        items: Array,
        hasError: Boolean,
    },

    data() {
        return {
            ItemsArray: [],
            ciao: 'ciao',
        }
    },

    created() {
        // console.log(localStorage)

        if (this.hasError === 'true') {
            this.ItemsArray = JSON.parse(localStorage.getItem("Item") || '[]')
        } else {
            // svuotare il local storage se esiste un valore
            localStorage.clear();
            this.ItemsArray = [];
        }

        // console.log(this.ItemsArray)
    },

    mounted() {
        console.log(this.hasError);
    },

    methods: {
        pushItemId(item) {

            // console.log(this.ItemsArray)
            item.qty = 1;

            if (this.ItemsArray.includes(item) === false) {

                this.ItemsArray.push(item);

                localStorage.setItem("Item", JSON.stringify(this.ItemsArray));

            }

        },


        removeItem(index, elementsRemoved) {
            this.ItemsArray.splice(index, elementsRemoved)

            localStorage.setItem("Item", JSON.stringify(this.ItemsArray));
        },


        hide(id) {

            // if (this.ItemsArray.includes(item) === true){
            //     return 'hidden'
            // }

            // console.log(id)

            let hidden = false;

            this.ItemsArray.forEach(element => {
                // if(element.id == id){console.log(element.id + "contained"); hidden = true;}
                if (element.id == id) {
                    hidden = true;
                }
            });


            if (hidden === true) {
                return 'hidden'
            }

        },
    }
}

</script>


<template>
    <div class="container">
        <h1 class="text-center">
            Inventory Cart
        </h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <h2>Item</h2>
                    </th>
                    <th scope="col">
                        <h2>Qty</h2>
                    </th>
                    <th scope="col">
                        <h2>Remove</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="mb3" v-for="(item, i) in ItemsArray">
                    <td class="me-3">{{ item.name }}</td>
                    <td class="me-3">
                        <input type="hidden" :value="item.id" :name="`item[${i}][id]`">
                        <input class="cart-quantity-input" type="number" :value="item.qty" :name="`item[${i}][qty]`"
                            id="qty" min="1">
                    </td>
                    <td class="me-3">
                        <h3 @click="removeItem(i, 1)" class="btn btn-danger">Remove</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="container">
        <div class="accordion accordion-flush" id="accordionCartItems">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        List of Items
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionCartItems">
                    <div class="row gap-2 justify-content-center mt-1">

                        <div class="col-3" v-for="(item, i) in items">
                            <div class="card">
                                <div class="card-body cart-card">
                                    <h5 class="card-title">{{ item.name }}</h5>
                                    <button @click="pushItemId(item)" :class="hide(item.id)" type="button" :data-qty="1"
                                        :data-item-id="item.id" class="btn btn-coral">Add To Inventory</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>


<style lang="scss" scoped>
.card-title {
    font-size: 18px;
    font-weight: bolder;
    color: black;
}

.cart-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border: 1px solid coral;
}


.accordion-button {
    background-color: coral;
    color: white;
    font-weight: bolder;
}

.btn-coral {
    background-color: coral;
    color: white;
    max-height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: fit-content;
}

.cart-quantity-input {
    width: 50px;
}

.hidden {
    background-color: white;
    cursor: default;
    pointer-events: none;
}
</style>