<template>
  <main class="main">
    <h1 class="main__title">Todo list</h1>
    <TodoList :todos="todos" :order="order"></TodoList>
  </main>
</template>

<script>
import { fetchTodosList, fetchOrder } from "./api";

import TodoList from "./components/TodoList/TodoList.vue";

export default {
  data: () => {
    return {
      todos: {
        value: []
      },
      order: {
        value: []
      }
    }
  },
  components: {
    TodoList
  },
  mounted: function () {
    fetchTodosList()
      .then((todos) => {
        this.todos.value = todos
          .map((todo) => {
            if (todo.isDone === 0) {
              return { ...todo, isDone: false };
            }
            return { ...todo, isDone: true }
          });
      });
    getOrder()
      .then((order) => {
        this.order.value = order["todo_order"].split(",");
      });
  }
};
</script>

<style lang="scss" scoped>
.main {
  width: 60%;
  margin: 0 auto;
}
.main__title {
  border-bottom: 1px solid;
}
</style>