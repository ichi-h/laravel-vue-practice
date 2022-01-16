<template>
  <span class="checkbox">
    <input class="checkbox__input" :id="id" type="checkbox" :checked="checked" @click="onClick" />
    <label class="checkbox__label" :for="id"></label>
  </span>
</template>

<script>
export default {
  props: {
    id: {
      type: String,
      default: ""
    },
    checked: {
      type: Boolean,
      default: false,
    },
    onClick: {
      type: Function,
      default: undefined,
    }
  }
}
</script>

<style lang="scss" scoped>
@import "../../../sass/variables";

.checkbox {
  position: relative;
  display: inline;
  user-select: none;

  &__input {
    display: none;
  }

  &__input + &__label {
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
  }

  &__input + &__label::before {
    content: "";
    position: absolute;
    display: inline-block;
    box-sizing: border-box;
    width: 20px;
    height: 20px;
    left: 50%;
    transform: translateX(-50%);
    border: 1px solid $text-color;
    background: none;
  }

  &__input:checked + &__label::after {
    content: "";
    position: absolute;
    display: inline-block;
    box-sizing: border-box;
    width: 18px;
    height: 9px;
    margin-top: -9px;
    top: 50%;
    left: 3px;
    transform: rotate(-45deg);
    border-bottom: 3px solid;
    border-left: 3px solid;
    border-color: $text-color;
  }
}
</style>