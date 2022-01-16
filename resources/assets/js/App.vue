<template>
  <section>
    <p>todos: {{ todos }}</p>
    <p>order: {{ order }}</p>
  </section>
</template>

<script>
import { fetchTodosList, fetchOrder } from "./api";

export default {
  data: () => {
    return {
      todos: [],
      order: []
    }
  },
  mounted: function () {
    fetchTodosList()
      .then((json) => this.todos = json);
    fetchOrder()
      .then((order) => {
        this.order = order[0]["todo_order"].split(",");
      });
  }
};
</script>