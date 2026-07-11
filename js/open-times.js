'use strict';

(function () {
    function attach(container) {
        const input = container.querySelector('[data-open-times-input]');
        const preview = container.querySelector('[data-open-times-preview]');
        if (!input || input.dataset.openTimesReady) return;
        input.dataset.openTimesReady = '1';

        container.querySelectorAll('[data-open-times-value]').forEach((button) => {
            button.addEventListener('click', () => {
                input.value = button.dataset.openTimesValue || '';
                input.dispatchEvent(new Event('input', { bubbles: true }));
                input.focus();
            });
        });

        function updatePreview() {
            const value = input.value.trim();
            preview.className = 'gdo-open-times-preview';
            if (!value) {
                preview.textContent = '';
                return;
            }
            try {
                if (typeof opening_hours === 'function') {
                    const hours = new opening_hours(value);
                    preview.textContent = hours.getState() ?
                        (window.GDO_OPEN_TIMES_OPEN || 'Open now') :
                        (window.GDO_OPEN_TIMES_CLOSED || 'Closed now');
                    preview.classList.add('is-valid');
                } else {
                    preview.textContent = value;
                }
            } catch (error) {
                preview.textContent = window.GDO_OPEN_TIMES_INVALID || 'Please check the opening-hours syntax.';
                preview.classList.add('is-invalid');
            }
        }

        input.addEventListener('input', updatePreview);
        updatePreview();
    }

    function init() {
        document.querySelectorAll('.gdo-open-times').forEach(attach);
    }

    document.readyState === 'loading' ? document.addEventListener('DOMContentLoaded', init) : init();
})();
