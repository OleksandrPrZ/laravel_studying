<template>
    <li class="cartm">
        <a @click="toggleCart" href="#0" class="number cart-icon">
            <i class="flaticon-shopping-cart"></i>
            <span v-if="cartItems.length > 0" class="count">({{ cartItems.length }})</span>
        </a>
        <div v-if="isOpen" class="mini-cart-content">
            <h4>Shopping Cart</h4>
            <ul v-if="cartItems.length > 0">
                <li v-for="item in cartItems" :key="item.id" class="cart-item">
                    <img :src="item.image" :alt="item.name" class="item-image">
                    <div class="item-info">
                        <h5>{{ item.name }}</h5>
                        <p>Price: ${{ item.price }}</p>
                        <button @click="removeItem(item.id)" class="remove-btn">Remove</button>
                    </div>
                </li>
            </ul>
            <p v-else>Your cart is empty.</p>
        </div>
    </li>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
            cartItems: [
                { id: 1, name: 'Product 1', price: 49.99, image: '/path/to/image1.jpg' },
                { id: 2, name: 'Product 2', price: 29.99, image: '/path/to/image2.jpg' }
            ]
        };
    },
    methods: {
        toggleCart() {
            this.isOpen = !this.isOpen;
        },
        removeItem(itemId) {
            this.cartItems = this.cartItems.filter(item => item.id !== itemId);
        }
    }
};
</script>

<style scoped>
.cartm {
    position: relative;
}
.cart-icon {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
}

.mini-cart-content {
    position: absolute;
    top: 100%;
    right: 0;
    width: 300px;
    background: white;
    border: 1px solid #ccc;
    padding: 1em;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 100;
}
.cart-item {
    display: flex;
    align-items: center;
    margin-bottom: 1em;
}
.item-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    margin-right: 1em;
}
.item-info {
    flex-grow: 1;
}
.remove-btn {
    background: #e53935;
    color: white;
    border: none;
    padding: 0.5em;
    cursor: pointer;
}
</style>
