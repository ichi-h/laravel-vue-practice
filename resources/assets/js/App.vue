<template>
  <main class="main">
    <h1 class="main__title">Todo list</h1>
    <AddTodoForm :todos="todos" :order="order" />
    <TodoList :todos="todos" :order="order" />
  </main>
</template>

<script>
import { getTodosList, getOrder, setOrder } from "./api";
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
  watch: {
    todos: {
      handler: function () {
        const newOrder = this.todos.value
          .map((todo) => todo.id)
          .join();
        setOrder(newOrder);
      },
      deep: true
    }
  },
  mounted: function () {
    getOrder()
      .then((order) => {
        this.order.value = order["todo_order"].split(",");
      })
      .then(() => getTodosList())
      .then((todos) => {
        this.todos.value = todos
          .map((todo) => ({ ...todo, is_done: intToBool(todo.is_done) }));
        this.todos.value = this.order.value
          .map((id) => {
            for (let todo of this.todos.value) {
              if (`${todo.id}` === `${id}`) return todo;
            }
            return null;
          })
          .filter((todo) => todo !== null);
      });
  }
};
</script>

<style lang="scss" scoped>
.main {
  display: flex;
  align-items: center;
  flex-direction: column;
  gap: 5rem;
  width: 60%;
  margin: 0 auto;
}
</style>