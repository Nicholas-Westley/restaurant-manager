<template>
    <v-layout>
        <v-flex>
            <v-card
                @click.native="$emit('orderSelected', order)"
                :class="{
                    'selected': selectedOrder && selectedOrder.id === order.id,
                    'served': order.served
                }">
                <v-card-text
                    class="secondary--text"
                >
                    <h1>
                        Order {{ order.id }}
                    </h1>
                    <div v-for="item in order.order_items">
                        {{ item.recipe.name }}
                    </div>
                </v-card-text>

                <v-card-actions>
                    <order-operations
                        :order="order"
                        :hideDelete="true"
                        @acceptOrder="$emit('acceptOrder')"
                        @deleteOrder="$emit('deleteOrder')"
                        @serveOrder="$emit('serveOrder')"
                    />
                </v-card-actions>
            </v-card>
        </v-flex>
    </v-layout>
</template>

<script>
    import OrderOperations from "./OrderOperations";
    export default {
        name: "order",
        components: {OrderOperations},
        props: ['order', 'selectedOrder'],
        methods: {
            con() {
                console.log("I don't think so")
            }
        }
  }
</script>

<style scoped>
    .order {
        background-color: white;
        cursor: pointer;
        padding: 8px;
        box-shadow:inset 0 0 0 1px #b8c2cc;
    }
    .served {
        background-color: #b8c2cc;
        color: black;
        opacity: 0.2;
        box-shadow:inset 0 0 0 1px #555;

    }
    .selected {
        box-shadow:inset 0 0 0 4px var(--primary);
    }
</style>
