<template>
  <Draggable tag="ul" :list="todos.value" class="todo-list" handle=".handle">
    <TodoListItem
      v-for="todo in todos.value"
      :todo="todo"
      :onRemove="onRemove(todo.id)"
      :key="todo.id"
    />
  </Draggable>
</template>

<script>
import { deleteTodo, setOrder } from "../../api";
import TodoListItem from "./TodoListItem.vue";
import Draggable from "vuedraggable";

export default {
  props: {
    todos: Object,
    order: Object,
  },
  components: {
    Draggable,
    TodoListItem
  },
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
  }
}
</script>

<style lang="scss" scoped>
.todo-list {
  padding-left: 0;
}
</style>
