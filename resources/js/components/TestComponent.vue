<template>
    <div>
        <tr v-for="(invoice_product, k) in invoice_products" :key="k">
    <td scope="row" class="trashIconContainer">
        <i class="far fa-trash-alt" @click="deleteRow(k, invoice_product)"></i>
    </td>
    <td>
        <input class="form-control" type="text" v-model="invoice_product.product_no" />
    </td>
    <td>
        <input class="form-control" type="text" v-model="invoice_product.product_name" />
    </td>
</tr>
<button type='button' class="btn btn-info" @click="addNewRow">
    <i class="fas fa-plus-circle"></i>
    Add
</button>
    </div>
</template>
<script>
export default {
    data() {
        return{
             invoice_products: [{
                product_no: '',
                product_name: '',
                product_price: '',
                product_qty: '',
                line_total: 0
            }]
        }
           
        },
         methods:{
        addNewRow() {
            this.invoice_products.push({
                product_no: '',
                product_name: '',
                product_price: '',
                product_qty: '',
                line_total: 0
            });
        },
                deleteRow(index, invoice_product) {
            var idx = this.invoice_products.indexOf(invoice_product);
            console.log(idx, index);
            if (idx > -1) {
                this.invoice_products.splice(idx, 1);
            }
        },
    }
}
</script>