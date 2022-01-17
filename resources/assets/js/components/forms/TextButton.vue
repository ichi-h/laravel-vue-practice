<template>
  <button class="text-btn" @click="onClick" :type="type">[{{ value }}]</button>
</template>

<script>
export default {
  props: {
    onClick: Function,
    value: String,
    type: String
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";

.text-btn {
  border: 0;
  outline: 0;
  background: none;
  transition: 0.1s;

  &:hover {
    color: $brand-primary;
  }
}
</style>
