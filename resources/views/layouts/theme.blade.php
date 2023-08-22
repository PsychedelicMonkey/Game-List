<script>
    function updateTheme() {
        if (!('theme' in localStorage)) {
            localStorage.theme = 'system';
        }

        switch (localStorage.theme) {
            case 'system':
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.classList.add('dark');
                    document.documentElement.setAttribute('data-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.setAttribute('data-theme', 'light');
                }

                document.documentElement.setAttribute('color-theme', 'system');
                break;

            case 'dark':
                document.documentElement.classList.add('dark');
                document.documentElement.setAttribute('data-theme', 'dark');
                document.documentElement.setAttribute('color-theme', 'dark');
                break;

            case 'light':
                document.documentElement.classList.remove('dark');
                document.documentElement.setAttribute('data-theme', 'light');
                document.documentElement.setAttribute('color-theme', 'light');
                break;
        }
    }

    updateTheme();
</script>
