import Alpine from 'alpinejs';

Alpine.store('theme', {
  value: 'light',

  init() {
    if (
      localStorage.theme === 'dark' ||
      (!('theme' in localStorage) &&
        window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
      document.documentElement.classList.add('dark');
      this.value = 'dark';
    } else {
      document.documentElement.classList.remove('dark');
      this.value = 'light';
    }

    localStorage.setItem('theme', this.value);
  },

  changeTheme() {
    if (document.documentElement.classList.contains('dark')) {
      document.documentElement.classList.remove('dark');
      this.value = 'light';
    } else {
      document.documentElement.classList.add('dark');
      this.value = 'dark';
    }

    localStorage.setItem('theme', this.value);
  },
});
