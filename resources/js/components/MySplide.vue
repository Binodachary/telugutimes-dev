<template>
  <div class="splide">
    <div class="splide__track">
      <div class="splide__list">
        <slot />
      </div>
    </div>
    <div v-if="splide" class="splide-pagination">
      <button v-for="(slide, index) in splide.slides" :key="index"
              :class="{ 'is-active': activeIndex === index }"
              @click="splide.go(index)">
        {{ index + 1 }}
      </button>
    </div>
  </div>
</template>

<script>
import Splide from '@splidejs/splide';
import { SplideSlide } from '@splidejs/vue-splide';

export default {
  name: 'MySplide',
  props: {
    options: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      splide: null,
      activeIndex: 0,
    }
  },
  mounted() {
    const splide = new Splide(this.$el, this.options);
    splide.mount();
    this.splide = splide;
    this.splide.on('move', (newIndex) => {
      this.activeIndex = newIndex;
    });
    this.$emit('after-mounted', splide);
  },
  components: {
    SplideSlide,
  },
};
</script>
