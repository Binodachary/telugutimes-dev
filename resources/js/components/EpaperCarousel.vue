<template>
  <div class="carousel" ref="carousel">
    <div class="pagination">
      <button @click="goToPrevPage" :disabled="isFirstPage">&lt;</button>
      <button v-for="(range, index) in pageRanges" :key="index" @click="goToPage(index)"
              :class="{ active: index === currentPage }" v-text="range"></button>
      <button @click="goToNextPage" :disabled="isLastPage">&gt;</button>
    </div>
    <ul class="carousel-items" data-gallery="epaper">
      <li v-for="image in items" v-show="paginatedItems.includes(image)" :key="image">
        <a :href="`/storage/${epaper.folder}/${image}`" class="w-1/2 glightbox">
          <img class="w-full border border-gray-300 object-cover" :src="`/storage/${epaper.folder}/${image}`"
               :alt="image">
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import Glightbox from 'glightbox';

export default {
  props: {
    items: {
      type: Array,
      required: true
    },
    itemsPerPage: {
      type: Number,
      default: 2
    },
    epaper: {
      type: Object,
      default: {}
    }
  },
  data() {
    return {
      currentPage: 0
    }
  },
  computed: {
    paginatedItems() {
      const startIndex = this.currentPage * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return this.items.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.items.length / this.itemsPerPage);
    },
    pageRanges() {
      const ranges = [];
      let currentPage = 1;
      while (currentPage <= this.items.length - 1) {
        if (currentPage === 1) {
          ranges.push("Cover page");
          currentPage += 1;
        } else if (currentPage === 2) {
          ranges.push("2-3");
          currentPage += 2;
        } else {
          const lastPage = Math.min(currentPage + 1, this.items.length - 1);
          ranges.push(`${currentPage}-${lastPage}`);
          currentPage += 2;
        }
      }
      return ranges;
    },
    isFirstPage() {
      return this.currentPage === 0;
    },
    isLastPage() {
      return this.currentPage === this.totalPages - 1;
    },
    translateValue() {
      return -this.currentPage * (100 / this.itemsPerPage) + "%";
    }
  },
  mounted() {
    let allImages = this.items.map(img => ({href: `/storage/${this.epaper.folder}/${img}`}));
    const lightbox = Glightbox({
      selector: 'glightbox',
      elements: allImages
    });
  },
  methods: {
    goToPrevPage() {
      if (!this.isFirstPage) {
        this.currentPage--;
      }
    },
    goToNextPage() {
      if (!this.isLastPage) {
        this.currentPage++;
      }
    },
    goToPage(pageIndex) {
      this.currentPage = pageIndex;
    }
  }
}
</script>

<style scoped>
.carousel {
  overflow: hidden;
  position: relative;
  height: 900px;
}

.carousel-items {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
  transition: transform 0.3s ease-in-out;
}

.carousel-items li {
  margin-right: 0;
  text-align: center;
  padding: 2rem 0;
}

.carousel-items li:last-child {
  margin-right: 0;
}

.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 1rem;
}

.pagination button {
  background-color: #333;
  color: #fff;
  border: none;
  font-size: 12px;
  padding: 0.5rem;
  margin: 0 0.25rem;
  cursor: pointer;
}

.pagination button.active {
  background-color: #fff;
  color: #333;
}
@media screen and (max-width: 767px) {
  .pagination{
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    grid-gap: 1rem;
  }
}
</style>