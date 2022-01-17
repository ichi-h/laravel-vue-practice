<template>
  <li class="todo-item">
    <Checkbox :id="`check_${todo.id}`" :checked="todo.isDone" :onClick="toggleIsDone" />
    <InputText type="text" :value="todo.task" :onTaskBlur="onTaskBlur" :disabled="todo.isDone" />
    <button class="todo-item__remove" @click="onRemove">[x]</button>
  </li>
</template>

<script>
import Checkbox from "../forms/Checkbox.vue";
import InputText from "../forms/InputText.vue"

export default {
  props: {
    todo: Object,
    onRemove: Function
  },
  components: {
    Checkbox,
    InputText
  },
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

  &__remove {
    border: 0;
    outline: 0;
    background: none;
    transition: 0.1s;
  }
}
</style>
