<template>
  <div>
    <section>
      <div class="grid-header bg-blue-600 mb-3 p-2 pr-0 xl:flex flex-wrap justify-between items-center">
        <h1 class="xl:text-base md:flex block text-sm font-bold text-white border-l-4 pl-3 border-white" v-text="heading"/>
        <nav class="flex -mb-2" role="tablist">
          <a href="#" v-for="(tab, index) in tabs"
             class="py-2 px-1 lg:px-2 block font-medium text-white focus:outline-none transition duration-300 ease-in-out text-xs xl:text-sm"
             :class="[tab.isActive ? activeClass : '',linkClass]"
             v-text="tab.title" @click.prevent="activeTab = tab"
             role="tab" :aria-selected="tab.isActive"/>
        </nav>
      </div>
    </section>
    <slot></slot>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tabs: [],
      activeTab: null
    };
  },
  props: {
    heading: String,
    activeClass: String,
    linkClass: String
  },
  mounted() {
    this.tabs = this.$children;
    this.setInitialActiveTab();
  },
  watch: {
    activeTab(activeTab) {
      this.tabs.map(tab => (tab.isActive = tab == activeTab));
    }
  },
  methods: {
    setInitialActiveTab() {
      this.activeTab = this.tabs.find(tab => tab.active) || this.tabs[0];
    }
  }
};
</script>
