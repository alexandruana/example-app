<template>
  <div class="counter">
    <h1>{{ message }}</h1>
    <input v-model="inputValue" placeholder="Type something here..." />
    <button @click="greet">Greet</button>
    <p>Reversed Message: {{ reversedMessage }}</p>
  </div>
</template>

<script>
    export default {
        name: 'Counter',
        data() {
            return {
            message: 'Hello Vue!',
            inputValue: ''
            };
        },
        computed: {
            reversedMessage() {
            return this.inputValue.split('').reverse().join('');
            }
        },
        methods: {
            greet() {
            alert(`Hello! You typed: ${this.inputValue}`);
            }
        }
    };
</script>

<style scoped>
.example-component {
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 8px;
  text-align: center;
}

.example-component h1 {
  color: #42b983;
}

.example-component input {
  margin: 10px 0;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.example-component button {
  padding: 8px 15px;
  background-color: #42b983;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.example-component button:hover {
  background-color: #369b74;
}
</style>
