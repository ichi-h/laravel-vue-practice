<template>
  <main class="main">
    <h1 class="main__title">
      Todo list
      <span class="main__isNotDone">({{ remaining }} / {{ todos.value.length }})</span>
    </h1>
    <AddTodoForm :todos="todos" :order="order" />
    <TextButton value="purge" type="button" :onClick="purge" />
    <TodoList :todos="todos" :order="order" />
  </main>
</template>

<script>
import { getTodosList, deleteTodo, getOrder, setOrder } from "./api";
import { intToBool } from "./utils/intToBool";

import TextButton from "./components/forms/TextButton.vue";
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
    TextButton,
    AddTodoForm,
    TodoList
  },
  watch: {
    todos: {
      handler: function () {
        const newOrder = this.todos.value
          .map((todo) => todo.id);
        this.order.value = newOrder;
        setOrder(newOrder.join());
      },
      deep: true
    }
  },
  computed: {
    remaining: function () {
      return this.todos.value
        .filter((todo) => !todo.is_done)
        .length
    }
  },
  methods: {
    purge: function () {
      if (confirm("Removes all completed tasks. Are you sure?")) {
        const done = this.todos.value
          .filter((todo) => todo.is_done);
        const notDone = this.todos.value
          .filter((todo) => !todo.is_done);

        this.todos.value = notDone;
        this.order.value = this.todos.value
          .map((todo) => todo.id);

        done.forEach((todo) => deleteTodo(todo.id));
        setOrder(this.order.value.join());
      }
    }
  },
  mounted: function () {
    getOrder()
      .then((order) => {
        if (order["todo_order"] === null) {
          this.order.value = [""];
        } else {
          this.order.value = order["todo_order"].split(",");
        }
      })
      .then(() => getTodosList())
      .then((todos) => {
        if (!todos.length) {
          this.todos.value = [];
          return;
        }

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

  &__isNotDone {
    font-size: 2rem;
  }
}
</style>