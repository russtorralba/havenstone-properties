document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute('aria-expanded', String(! isOpen));
            mobileMenu.classList.toggle('hidden', isOpen);
        });

        mobileMenu.querySelectorAll('[data-menu-link]').forEach((link) => {
            link.addEventListener('click', () => {
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileMenu.classList.add('hidden');
            });
        });
    }

    document.querySelectorAll('[data-faq-accordion] details').forEach((detail) => {
        detail.addEventListener('toggle', () => {
            if (! detail.open) {
                return;
            }

            document.querySelectorAll('[data-faq-accordion] details').forEach((otherDetail) => {
                if (otherDetail !== detail) {
                    otherDetail.open = false;
                }
            });
        });
    });

    const viewingForm = document.querySelector('[data-viewing-form]');

    if (viewingForm) {
        const requiredFields = {
            full_name: 'The full name field is required.',
            mobile_number: 'The mobile number field is required.',
            email: 'The email field is required.',
            preferred_property: 'The preferred property field is required.',
            preferred_viewing_date: 'The preferred viewing date field is required.',
        };
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        const clientErrorId = (field) => `${field.name}_client_error`;
        const serverError = (field) => document.getElementById(`${field.name}_error`);
        const clientError = (field) => document.getElementById(clientErrorId(field));

        const updateDescribedBy = (field, id, shouldAdd) => {
            const descriptions = (field.getAttribute('aria-describedby') || '')
                .split(/\s+/)
                .filter(Boolean)
                .filter((description) => description !== id);

            if (shouldAdd) {
                descriptions.push(id);
            }

            if (descriptions.length) {
                field.setAttribute('aria-describedby', descriptions.join(' '));
            } else {
                field.removeAttribute('aria-describedby');
            }
        };

        const validationMessage = (field) => {
            const value = field.value.trim();

            if (! value) {
                return requiredFields[field.name];
            }

            if (field.name === 'email' && ! emailPattern.test(value)) {
                return 'Please enter a valid email address.';
            }

            return '';
        };

        const showClientError = (field, message) => {
            field.classList.add('field-input-error');
            field.setAttribute('aria-invalid', 'true');

            if (serverError(field)) {
                return;
            }

            let messageElement = clientError(field);

            if (! messageElement) {
                messageElement = document.createElement('p');
                messageElement.id = clientErrorId(field);
                messageElement.className = 'field-error';
                messageElement.setAttribute('role', 'alert');
                messageElement.dataset.clientError = 'true';
                field.insertAdjacentElement('afterend', messageElement);
                updateDescribedBy(field, messageElement.id, true);
            }

            messageElement.textContent = message;
        };

        const clearClientError = (field) => {
            const messageElement = clientError(field);

            if (! messageElement) {
                return;
            }

            messageElement.remove();
            updateDescribedBy(field, clientErrorId(field), false);

            if (! serverError(field)) {
                field.classList.remove('field-input-error');
                field.removeAttribute('aria-invalid');
            }
        };

        Object.keys(requiredFields).forEach((name) => {
            const field = viewingForm.elements.namedItem(name);

            field?.addEventListener(field.type === 'date' || field.tagName === 'SELECT' ? 'change' : 'input', () => {
                if (! clientError(field)) {
                    return;
                }

                const message = validationMessage(field);

                if (message) {
                    showClientError(field, message);
                } else {
                    clearClientError(field);
                }
            });
        });

        viewingForm.addEventListener('submit', (event) => {
            const invalidFields = [];

            Object.keys(requiredFields).forEach((name) => {
                const field = viewingForm.elements.namedItem(name);

                if (! field) {
                    return;
                }

                const message = validationMessage(field);

                if (message) {
                    showClientError(field, message);
                    invalidFields.push(field);
                } else {
                    clearClientError(field);
                }
            });

            if (invalidFields.length) {
                event.preventDefault();
                invalidFields[0].focus();
            }
        });
    }
});
