<template>
  <div>
    <div>
      <h1 class="text-2xl py-3">Latest Posts</h1>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:rid-cols-3 lg:grid-cols-4 gap-6 py-4">
      <div v-for="post in posts" :key="post.id" class="bg-white  shadow-md relative overflow-hidden">
        <img :src="post.post_image" alt="Post image" class="w-full h-48 object-center object-cover" />
        <div class="p-4">
          <h2 class="text-lg font-semibold mb-2">{{ post.post_title }}</h2>
          <p class="text-gray-700 mb-4">{{ post.post_text }}</p>
          <div class="flex items-center mb-4">
            <img :src="post.author_image" alt="Author image" class="w-8 h-8 rounded-full mr-2" />
            <span class="font-medium">{{ post.author }}</span>
          </div>
          <div class="flex items-center space-x-4">
            <button @click="likePost(post.id)" class="flex items-center text-red-500 hover:text-red-700">
              <ion-icon name="heart"></ion-icon>
              <span class="ml-1">{{ post.likes }}</span>
            </button>
            <button @click="commentOnPost(post.id)" class="flex items-center text-green-500 hover:text-green-700">
             <ion-icon name="chatbox"></ion-icon>
              <span class="ml-1">{{ post.comments }}</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const posts = ref([
  {
    id: 1,
    post_image: 'https://images.unsplash.com/photo-1722898807281-173b005badc5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwyfHx8ZW58MHx8fHx8',
    post_title: 'Post Title 1',
    post_text: 'This is the post text. It contains details about the post.',
    author: 'Author Name 1',
    author_image: 'https://randomuser.me/api/portraits/women/72.jpg',
    likes: 42,
    comments: 12,
  },
  {
    id: 2,
    post_image: 'https://images.unsplash.com/photo-1722630169108-5cef80b9f95b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHw0fHx8ZW58MHx8fHx8',
    post_title: 'Post Title 2',
    post_text: 'This is another post text. It contains details about another post.',
    author: 'Author Name 2',
    author_image: 'https://randomuser.me/api/portraits/women/72.jpg',
    likes: 35,
    comments: 8,
  },
  {
    id: 3,
    post_image: 'https://images.pexels.com/photos/3794359/pexels-photo-3794359.jpeg?auto=compress&cs=tinysrgb&w=600',
    post_title: 'Batman Takes Over Gotham',
    post_text: 'This is another post text. It contains details about another post.',
    author: 'superman',
    author_image: 'https://via.placeholder.com/40',
    likes: 135,
    comments: 80,
  },

  {
    id: 4,
    post_image: 'https://images.pexels.com/photos/4386402/pexels-photo-4386402.jpeg?auto=compress&cs=tinysrgb&w=600',
    post_title: 'Batman Takes Over Gotham',
    post_text: 'This is another post text. It contains details about another post.',
    author: 'superman',
    author_image: 'https://via.placeholder.com/40',
    likes: 135,
    comments: 80,
  },
  {
    id: 5,
    post_image: 'https://images.pexels.com/photos/4041271/pexels-photo-4041271.jpeg?auto=compress&cs=tinysrgb&w=600',
    post_title: 'Batman Takes Over Gotham',
    post_text: 'This is another post text. It contains details about another post.',
    author: 'superman',
    author_image: 'https://via.placeholder.com/40',
    likes: 135,
    comments: 80,
  },

  {
    id: 6,
    post_image: 'https://images.unsplash.com/photo-1722630169108-5cef80b9f95b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHw0fHx8ZW58MHx8fHx8',
    post_title: 'Batman Takes Over Gotham',
    post_text: 'This is another post text. It contains details about another post.',
    author: 'superman',
    author_image: 'https://via.placeholder.com/40',
    likes: 135,
    comments: 80,
  },
]);

function likePost(postId) {
  console.log('Like button clicked for post ID:', postId);
  // Add logic to handle liking a post
}

function commentOnPost(postId) {
  console.log('Comment button clicked for post ID:', postId);
  // Add logic to handle commenting on a post
}
</script>

<style scoped>
/* Add your styles here if needed */
</style>
