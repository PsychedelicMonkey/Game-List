export const toDarkTheme = () => {
  localStorage.setItem('theme', 'dark');
  window.updateTheme();
};

export const toLightTheme = () => {
  localStorage.setItem('theme', 'light');
  window.updateTheme();
};

export const toSystemTheme = () => {
  localStorage.setItem('theme', 'system');
  window.updateTheme();
};
