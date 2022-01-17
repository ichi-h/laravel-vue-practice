<template>
  <li class="todo-item">
    <Checkbox :id="`check_${todo.id}`" :checked="todo.isDone" :onClick="toggleIsDone" />
    <InputText type="text" :value="todo.task" :onChange="onTaskChange" :disabled="todo.isDone" />
    <TextButton value="x" :onClick="onDeleteClick" />
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
      this.todo.isDone = e.currentTarget.checked;
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
}
</style>
