<template>
  <input
    class="input-text"
    type="text"
    :value="value"
    @change="onChange"
    :placeholder="placeholder"
    :disabled="disabled"
  />
</template>

<script>
export default {
  props: {
    value: String,
    disabled: Boolean,
    onChange: Function,
    placeholder: String,
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";

.input-text {
  border: 0;
  outline: 0;
  width: 50rem;
  max-width: 90vw;
  background: none;
  transition: 0.1s;
  padding-left: 1rem;
  border: 1px solid rgba($color: $text-color, $alpha: 0);
  border-radius: 10px;

  &:hover {
    border-color: rgba($color: $text-color, $alpha: 0.3);
  }

  &:focus {
    border-color: $brand-primary;
  }

  &:disabled {
    border-color: rgba($color: $text-color, $alpha: 0);
    text-decoration: line-through;
  }
}
</style>