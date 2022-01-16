<template>
  <section class="todo">
    <section v-for="todo in orderedTodos">
      <TodoListItem :todo="todo"></TodoListItem>
    </section>
  </section>
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
</style>
