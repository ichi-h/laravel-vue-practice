<template>
  <ul class="todo-list">
    <TodoListItem v-for="todo in orderedTodos" :todo="todo" :key="todo.id" />
  </ul>
</template>

<script>
import TodoListItem from "./TodoListItem.vue";

export default {
  props: {
    todos: Array,
    order: Array,
  },
  components: { TodoListItem },
  computed: {
    orderedTodos: function () {
      return (
        this.order
          .map((id) => {
            for (let todo of this.todos) {
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
