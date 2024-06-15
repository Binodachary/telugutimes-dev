<template>
  <div class="fixed -inset-0 bg-blue-600 z-20 flex animate__animated" :class="animation" v-if="toggleWelcomeNote">
    <div class="overflow-y-auto space-y-4 flex flex-col mx-auto text-white">
      <div v-if="welcomeNote.image">
        <a :href="welcomeNote.url" target="_blank">
          <img :src="`/storage/welcomes/${welcomeNote.image}`" alt="welcome image">
        </a>
      </div>
      <div class="flex" v-html="welcomeNote.description"/>
      <div class="flex justify-center">
        <a href="#" @click.prevent="goHome(welcomeNote.id)" class="btn bg-purple-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          <span class="ml-1">GO HOME</span>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import lscache from "../lscache";

export default {
  name: "WelcomeNote",
  props: ["welcomeNote"],
  data() {
    return {
      toggleWelcomeNote: true,
      animation: ''
    }
  },
  created() {
    if (lscache.get('welcomeNote') > 0) {
      this.toggleWelcomeNote = false;
      document.body.classList.remove('overflow-hidden');
    } else {
      document.body.classList.add('overflow-hidden');
    }
  },
  methods: {
    goHome(welcomeNoteId) {
      this.animation = 'animate__rollOut';
      setTimeout(() => {
        document.body.classList.remove('overflow-hidden');
        lscache.set('welcomeNote', welcomeNoteId, 23 * 60);
      }, 500)
    }
  }
}
</script>