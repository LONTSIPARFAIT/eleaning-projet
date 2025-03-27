<div class="pt-20 text-center">
    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); console.log('Dark Mode:', darkMode)" class="p-2 bg-red-500 text-white rounded">
        Toggle Dark Mode
    </button>
</div>