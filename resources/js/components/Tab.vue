<template>
  <div class="tab-content" role="tabpanel">
    <div class="tab-pane flex flex-wrap" v-show="isActive">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {},
    active: {type: Boolean, default: false}
  },
  data() {
    return {
      isActive: this.active
    };
  }
};
</script>