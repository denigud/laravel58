<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <v-dialog :value="value" @input="$emit('input')">
                <form>
                  <div class="card">
                      <div class="card-body">
                          <div class="card-title">
                              <h2>Your Cart</h2>
                          </div>

                        <p v-show="!products.length"><i>Please add some products to cart.</i></p>
                        <ul>
                          <li
                            v-for="product in products"
                            :key="product.id">
                            {{ product.title }} - {{ product.price | currency }} x {{ product.quantity }}
                          </li>
                        </ul>
                        <p>Total: {{ total | currency }}</p>
                        <p><button class="btn btn-primary" :disabled="!products.length" @click="checkout(products)">Checkout</button></p>
                        <p v-show="checkoutStatus">Checkout {{ checkoutStatus }}.</p>
                      </div>
                  </div>
                </form>
            </v-dialog>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapState } from 'vuex'

export default {
  props:['value'],
    data(){
      return{
        currency: 0,
        }
    },
  computed: {
    ...mapState({
      checkoutStatus: state => state.cart.checkoutStatus
    }),
    ...mapGetters('cart', {
      products: 'cartProducts',
      total: 'cartTotalPrice'
    })
  },
  methods: {
    checkout (products) {
      this.$store.dispatch('cart/checkout', products)
    }
  }
}
</script>
