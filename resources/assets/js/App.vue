<template>
  <main class="main">
    <h1 class="main__title">Todo list</h1>
    <AddTodoForm :todos="todos" :order="order" />
    <hr />
    <TodoList :todos="todos" :order="order" />
  </main>
</template>

<script>
import { getTodosList, getOrder } from "./api";
import { intToBool } from "./utils/intToBool";

import AddTodoForm from "./components/forms/AddTodoForm.vue";
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
    AddTodoForm,
    TodoList
  },
  mounted: function () {
    getTodosList()
      .then((todos) => {
        this.todos.value = todos
          .map((todo) => ({ ...todo, isDone: intToBool(todo.isDone) }));
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