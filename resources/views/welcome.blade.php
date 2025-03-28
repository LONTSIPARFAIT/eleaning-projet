<html x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' || false }" :class="{ 'dark': darkMode }">
<body class="bg-gradient-to-br from-blue-50 to-orange-100 dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800">
<button @click.stop.prevent="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode); console.log('Dark Mode:', darkMode)">