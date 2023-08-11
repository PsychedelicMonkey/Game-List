import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { toSystemTheme, toDarkTheme, toLightTheme } from './theme.js';
window.toSystemTheme = toSystemTheme;
window.toDarkTheme = toDarkTheme;
window.toLightTheme = toLightTheme;
