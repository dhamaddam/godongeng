(() => {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.querySelectorAll('[data-tilt]').forEach((book) => {
        const stage = book.closest('.book-stage, .hero-book-scene, .detail-book-scene') || book;

        if (reduceMotion || !window.matchMedia('(pointer: fine)').matches) return;

        stage.addEventListener('pointermove', (event) => {
            const bounds = stage.getBoundingClientRect();
            const x = (event.clientX - bounds.left) / bounds.width - 0.5;
            const y = (event.clientY - bounds.top) / bounds.height - 0.5;
            book.style.setProperty('--tilt-x', `${3 - y * 10}deg`);
            book.style.setProperty('--tilt-y', `${-15 + x * 18}deg`);
        });

        stage.addEventListener('pointerleave', () => {
            book.style.removeProperty('--tilt-x');
            book.style.removeProperty('--tilt-y');
        });
    });

    document.querySelectorAll('[data-theme-choice]').forEach((choice) => {
        choice.addEventListener('click', () => {
            try {
                localStorage.setItem('go-dongeng-theme', choice.dataset.themeChoice);
            } catch (error) {
                // Theme selection still works when local storage is disabled.
            }
        });
    });

    document.querySelectorAll('.book-cover img, .illustration-frame img').forEach((image) => {
        image.addEventListener('error', () => {
            image.src = '/assets/theme/default/images/content/background-go-dongeng.png';
        }, { once: true });
    });
})();
