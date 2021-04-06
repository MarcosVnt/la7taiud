<template>
  <li
    class="p-4 mb-3 flex justify-between items-center bg-white border border-white shadow rounded-lg cursor-move"
  >
    <div class="flex items-center">
      <img class="w-10 h-10 rounded-full" :src="user.avatar" :alt="user.name">
      <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{user.name}}</p>
    </div>
    <div class="flex">
      <button
        aria-label="Edit user"
        class="action-button p-1 focus:outline-none focus:shadow-outline text-teal-500 hover:text-teal-600"
        @click="$emit('on-edit', user)"
      >
      </button>

      <button
        aria-label="Delete user"
        class="action-button p-1 focus:outline-none focus:shadow-outline text-red-500 hover:text-red-600"
        @click="$emit('on-delete', user)"
      >
      </button>
    </div>
  </li>
</template>
<script>
export default {
  components: {

  },
  props: {
    user: {
      type: Object,
      default: () => ({})
    }
  }
};
</script>  
+`pi82`