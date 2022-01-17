<template>
  <section class="add-form">
    <InputText :value="task" :onChange="onChange" placeholder="Input task..." />
    <TextButton value="add" :onClick="add" />
  </section>
</template>

<script>
import { addTodo, setOrder } from "../../api";
import { intToBool } from "../../utils/intToBool";

import InputText from "./InputText.vue";
import TextButton from "./TextButton.vue";

export default {
  props: {
    todos: Object,
    order: Object
  },
  data: function () {
    return {
      task: ""
    }
  },
  components: {
    InputText,
    TextButton
  },
  methods: {
    add: function () {
      if (this.task === "") {
        alert("Input task.");
        return;
      }

      addTodo(this.task)
        .then((res) => {
          this.todos.value = this.todos.value
            .concat({ ...res, isDone: intToBool(res.isDone) });
          this.order.value = this.order.value
            .concat(`${res.id}`);
          setOrder(this.order.value.join())
            .then(() => this.task = "");
        });
    },
    onChange: function (e) {
      this.task = e.currentTarget.value;
      console.log(this.task);
    }
  }
}
</script>

<style lang="scss" scoped></style>
