/**
 * Toggles password visibility on/off
 * @params {String} Field ID
 * @returns {void}
 */
const togglePasswordVisibility = (inputId) => {
    let hideIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                              </svg>`;
    let showIcon = `<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>`;
    let element = document.getElementById(inputId);
    let elementButton = document.getElementById(`${inputId}_button`);
    if (element.type === 'password') {
        element.type = 'text';
        elementButton.innerHTML = hideIcon;
    } else {
        element.type = 'password';
        elementButton.innerHTML = showIcon;
    }
};

/**
 * Toggles hide/show for contents like sidebar, dropdown etc
 * @params {String} Panel ID
 * @params {String} Panel Name
 * @params {Boolean} On page load
 * @returns {void}
 */
const togglePanel = (panelId, uniqueName, pageLoad = false) => {
    let panel = document.getElementById(panelId);
    let panelIdentifierName = `panel_${panelId}_${uniqueName}`;
    if (!pageLoad) {
        if (panel.classList.contains('hidden')) {
            panel.classList.remove('hidden');
            localStorage.setItem(panelIdentifierName, false);
            return;
        } else {
            panel.classList.add('hidden');
            localStorage.setItem(panelIdentifierName, true);
            return;
        }
    } else {
        if (localStorage.getItem(panelIdentifierName) == 'true') {
            if (!panel.classList.contains('hidden')) return panel.classList.add('hidden');
            return;
        }
        return panel.classList.remove('hidden');
    }
};

/**
 * Navigate to specific route etc
 * @params {String} Route
 * @returns {void}
 */
const goToRoute = (route) => {
    window.location.href = route;
    return;
};

/**
 * Delete a table item 
 * @params {String} Form ID
 * @params {String} Delete Message
 * @returns {void}
 */
const deleteTableItem = (formId, message = 'Are you sure you want to delete resource !') => {
    if (!confirm(`${message}`)) return;
    return document.getElementById(formId).submit();
};

/**
 * Delete a table item with user prompt
 * @params {String} JSON String with the following params ` @params {String} Form ID, @params {String} Delete Message , @params {Boolean} Use comparison value , @params {String} Comparison value`
 * @returns {void}
 */
const deleteTableItemWithPrompt = (json_string) => {
    if (!json_string) {
        alert('json_string is missing');
        return;
    }
    let data = JSON.parse(json_string);
    if (!data.formId) {
        alert('formId is required');
        return;
    }
    if (!data.message) {
        data['message'] = 'Are you sure you want to delete resource !';
    }
    if (!data.compareValue) {
        alert('compareValue is required');
        return;
    }

    if (!confirm(`${data.message}`)) return;
    let userInput = prompt(`Plese enter value ${data.compareValue}`);
    if (data.compareValue !== userInput) {
        alert('Incorrect values, try again later !');
        return;
    };

    return document.getElementById(formId).submit();
};





// ##-- On Page Load --##
window.onload = () => {
    togglePanel('admin_layout_sidebar', 'adminSidebar', true);
}