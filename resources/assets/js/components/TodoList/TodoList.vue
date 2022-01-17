<template>
  <ul class="todo-list">
    <TodoListItem
      v-for="todo in orderedTodos"
      :todo="todo"
      :onRemove="onRemove(todo.id)"
      :key="todo.id"
    />
  </ul>
</template>

<script>
import { deleteTodo, setOrder } from "../../api";
import TodoListItem from "./TodoListItem.vue";

export default {
  props: {
    todos: Object,
    order: Object,
  },
  components: { TodoListItem },
  methods: {
    onRemove: function (target) {
      return () => {
        if (confirm("Are you sure?")) {
          this.todos.value = this.todos.value
            .filter((todo) => todo.id !== target);
          this.order.value = this.order.value
            .filter((id) => id !== target);
          deleteTodo(target);
          setOrder(this.order.value.join());
        }
      }
    }
  },
  computed: {
    orderedTodos: function () {
      return (
        this.order.value
          .map((id) => {
            for (let todo of this.todos.value) {
              if (`${todo.id}` === `${id}`) return todo;
            }
            return null;
          })
          .filter((todo) => todo !== null)
      );
    }
  },
}
</script>

<style lang="scss" scoped>
.todo-list {
  padding-left: 0;
}
</style>
