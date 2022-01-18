<template>
  <li class="todo-item">
    <div class="handle">
      <div class="handle__border"></div>
      <div class="handle__border"></div>
      <div class="handle__border"></div>
    </div>
    <Checkbox :id="`check_${todo.id}`" :checked="todo.is_done" :onClick="toggleIsDone" />
    <InputText type="text" :value="todo.task" :onChange="onTaskChange" :disabled="todo.is_done" />
    <TextButton value="x" type="button" :onClick="onDeleteClick" />
  </li>
</template>

<script>
import { updateTodo } from "../../api";

import Checkbox from "../forms/Checkbox.vue";
import InputText from "../forms/InputText.vue"
import TextButton from "../forms/TextButton.vue";

export default {
  props: {
    todo: Object,
    onRemove: Function
  },
  components: {
    Checkbox,
    InputText,
    TextButton
  },
  methods: {
    toggleIsDone: function (e) {
      this.todo.is_done = e.currentTarget.checked;
      updateTodo(this.todo);
    },
    onTaskChange: function (e) {
      this.todo.task = e.currentTarget.value;
      updateTodo(this.todo);
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

  & ~ & {
    margin-top: 3rem;
  }
}

.handle {
  $size: 20px;

  display: inline-block;
  width: $size;
  height: $size;
  margin-right: 1rem;
  vertical-align: middle;
  cursor: move;

  &__border {
    border-top: 1px solid $text-color;

    & ~ & {
      margin-top: $size / 3;
    }
  }
}
</style>
