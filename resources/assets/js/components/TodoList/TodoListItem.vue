<template>
  <li class="todo-item">
    <input class="todo-item__is-done" type="checkbox" :checked="todo.isDone" />
    <input class="todo-item__task" type="text" :value="todo.task" :disabled="todo.isDone" />
    <button class="todo-item__remove">[x]</button>
  </li>
</template>

<script>
export default {
  props: {
    todo: Object
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";

.todo-item {
  list-style: none;
  padding: 0;

  &__is-done {
    background: none;
  }

  &__task,
  &__remove {
    border: 0;
    outline: 0;
    background: none;
    transition: 0.1s;
  }

  &__task {
    padding-left: 1rem;
    border: 1px solid rgba($color: $text-color, $alpha: 0);
    border-radius: 10px;

    &:hover {
      border-color: rgba($color: $text-color, $alpha: 0.3);
    }

    &:focus {
      border-color: rgba($color: $text-color, $alpha: 1);
    }

    &:disabled {
      border: none;
      text-decoration: line-through;
    }
  }
}
</style>
