import Alpine from 'alpinejs';

Alpine.store('theme', {
  value: 'light',

  init() {
    if (
      localStorage.theme === 'dark' ||
      (!('theme' in localStorage) &&
        window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
      this.value = 'dark';
    } else {
      this.value = 'light';
    }

    localStorage.setItem('theme', this.value);
  },

  changeTheme() {
    if (localStorage.theme === 'dark') {
      document.documentElement.classList.remove('dark');
      document.documentElement.setAttribute('data-theme', 'dark');
      this.value = 'light';
    } else {
      document.documentElement.classList.add('dark');
      document.documentElement.setAttribute('data-theme', 'light');
      this.value = 'dark';
    }

    localStorage.setItem('theme', this.value);
  },
});
