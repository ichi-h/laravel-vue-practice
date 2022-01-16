<template>
  <li class="todo-item">
    <Checkbox :id="`check_${todo.id}`" :checked="todo.isDone" :onClick="toggleIsDone" />
    <input
      class="todo-item__task"
      type="text"
      :value="todo.task"
      @blur="onTaskBlur"
      :disabled="todo.isDone"
    />
    <button class="todo-item__remove" @click="onRemove">[x]</button>
  </li>
</template>

<script>
import Checkbox from "../forms/Checkbox.vue";

export default {
  props: {
    todo: Object,
    onRemove: Function
  },
  components: { Checkbox },
  methods: {
    toggleIsDone: function (e) {
      this.todo.isDone = e.currentTarget.checked;
    },
    onTaskBlur: function (e) {
      this.todo.task = e.currentTarget.value;
    },
    onDeleteClick: function () {
      this.onRemove();
    }
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
      border-color: rgba($color: $text-color, $alpha: 0);
      text-decoration: line-through;
    }
  }
}
</style>
