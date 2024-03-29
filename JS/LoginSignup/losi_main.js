let GLOBAL_LAST_CLICKED_BTN_ID = '';

// Initial load
document.addEventListener('DOMContentLoaded', function () {

// Click the agent button by default
    document.getElementById('losi-agent-btn').click();
    document.getElementById('losi-user-type-form-agent').checked = true;

    GLOBAL_USER_TYPE = 'Agent';

    // If click the agent button
    document.getElementById('losi-agent-btn').addEventListener('click', function () {
        toggleButtons('losi-agent-btn', 'losi-supplier-btn');
        toggleRadioButtonsLosi('losi-user-type-form-agent');
        GLOBAL_USER_TYPE = 'Agent';

        setDebug("debug-global-user-type", GLOBAL_USER_TYPE);
        setDebug("debug-global-last-clicked-btn", GLOBAL_LAST_CLICKED_BTN_ID);

        toggleSupplierIDVisibility();
    });

    // If click the supplier button
    document.getElementById('losi-supplier-btn').addEventListener('click', function () {
        toggleButtons('losi-supplier-btn', 'losi-agent-btn');
        toggleRadioButtonsLosi('losi-user-type-form-supplier');
        GLOBAL_USER_TYPE = 'Supplier';

        setDebug("debug-global-user-type", GLOBAL_USER_TYPE);
        setDebug("debug-global-last-clicked-btn", GLOBAL_LAST_CLICKED_BTN_ID);

        toggleSupplierIDVisibility();
    });

     // If click the SIGN IN button
    document.getElementById('losi-signin-btn').addEventListener('click', function () {
        toggleButtons('losi-signin-btn', 'losi-signup-btn');
        toggleRadioButtonsLosi('losi-signin-radio');

        toggleSupplierIDVisibility();
    });

    document.getElementById('losi-signup-btn').addEventListener('click', function () {
        toggleButtons('losi-signup-btn', 'losi-signin-btn');
        toggleRadioButtonsLosi('losi-signup-radio');

        toggleSupplierIDVisibility();
    });
});

function toggleButtons(clickedBtnId, otherBtnId) {
    // If the same button is clicked again, do nothing
    if (GLOBAL_LAST_CLICKED_BTN_ID === clickedBtnId) {
        return;
    }

    // Toggle the 'clicked' class for styling if needed
    document.getElementById(clickedBtnId).classList.add('btn-single-clicked');
    document.getElementById(otherBtnId).classList.remove('btn-single-clicked');

    // Update the last clicked button
    GLOBAL_LAST_CLICKED_BTN_ID = clickedBtnId;
}

function toggleRadioButtonsLosi(radioId) {
    let radio = document.getElementById(radioId);

    // Only toggle the radio button if it's not already checked
    if (!radio.checked) {
        radio.checked = !radio.checked;
    }
}

function displaySignInForm() {
    let formInputs = document.getElementsByClassName('losi-form-input');
    let signUpContainers = document.getElementsByClassName('losi-form-input-signup-container');
    let signInContainers = document.getElementsByClassName('losi-form-input-signin-container');


    // Loop through formInputs and set their display style
    for (let i = 0; i < formInputs.length; i++) {
        formInputs[i].style.display = 'flex';
    }

    // Loop through signUpContainers and set their display style
    for (let j = 0; j < signUpContainers.length; j++) {
        signUpContainers[j].style.display = 'none';
        // Reset the value of input elements inside the signUpContainer
        let inputs = signUpContainers[j].querySelectorAll('input');
        for (let k = 0; k < inputs.length; k++) {
            inputs[k].value = "";  // Reset the value
        }
        // Remove the 'required' attribute for sign-up elements
        for (let k = 0; k < inputs.length; k++) {
            inputs[k].removeAttribute('required');
        }
    }

    // Loop through signInContainers and set their display style
    for (let k = 0; k < signInContainers.length; k++) {
        signInContainers[k].style.display = 'flex';
        // Reset the value of input elements inside the signInContainer
        let inputs = signInContainers[k].querySelectorAll('input');
        for (let l = 0; l < inputs.length; l++) {
            inputs[l].value = "";  // Reset the value
        }
        // Add the 'required' attribute for sign-in elements
        for (let l = 0; l < inputs.length; l++) {
            inputs[l].setAttribute('required', 'true');
        }
    }
}

function displaySignUpForm() {
    let formInputs = document.getElementsByClassName('losi-form-input');
    let signUpContainers = document.getElementsByClassName('losi-form-input-signup-container');
    let signInContainers = document.getElementsByClassName('losi-form-input-signin-container');

    // Loop through formInputs and set their display style
    for (let i = 0; i < formInputs.length; i++) {
        formInputs[i].style.display = 'flex';
    }

    // Loop through signUpContainers and set their display style
    for (let j = 0; j < signUpContainers.length; j++) {
        signUpContainers[j].style.display = 'flex';
        // Reset the value of input elements inside the signUpContainer
        let inputs = signUpContainers[j].querySelectorAll('input');
        for (let k = 0; k < inputs.length; k++) {
            inputs[k].value = "";  // Reset the value
        }
        // Add the 'required' attribute for sign-up elements
        for (let k = 0; k < inputs.length; k++) {
            inputs[k].setAttribute('required', 'true');
        }
    }

    // Loop through signInContainers and set their display style
    for (let k = 0; k < signInContainers.length; k++) {
        signInContainers[k].style.display = 'none';
        // Reset the value of input elements inside the signInContainer
        let inputs = signInContainers[k].querySelectorAll('input');
        for (let l = 0; l < inputs.length; l++) {
            inputs[l].value = "";  // Reset the value
        }
        // Remove the 'required' attribute for sign-in elements
        for (let l = 0; l < inputs.length; l++) {
            inputs[l].removeAttribute('required');
        }
    }
}

function toggleSupplierIDVisibility() {
    // Get the Supplier ID textbox element for sign up
    let signUpSupplierIDTextboxContainer = document.getElementById('losi-form-sign-up-supplier-id');
    let signInSupplierIDTextboxContainer = document.getElementById('losi-form-sign-in-supplier-id');

    let signInSupplierIDTextbox = document.getElementById('losi-form-supplier-sign-in-id-textbox');
    let signUpSupplierIDTextbox = document.getElementById('losi-form-sign-up-supplier-id-textbox');

    // Toggle visibility based on the value of GLOBAL_USER_TYPE
    if (GLOBAL_USER_TYPE === 'Supplier') {

        // If click sign up
        if(GLOBAL_LAST_CLICKED_BTN_ID === 'losi-signup-btn') {
            signUpSupplierIDTextboxContainer.style.display = 'none';
            signUpSupplierIDTextbox.removeAttribute('required');

            signInSupplierIDTextboxContainer.style.display = 'none';
            signInSupplierIDTextbox.removeAttribute('required');

        // If click sign in
        } else {
            signInSupplierIDTextboxContainer.style.display = 'none';
            signInSupplierIDTextbox.removeAttribute('required');

            signUpSupplierIDTextboxContainer.style.display = 'none';
            signUpSupplierIDTextbox.removeAttribute('required');
        }

    } else if (GLOBAL_USER_TYPE === 'Agent') {

        if(GLOBAL_LAST_CLICKED_BTN_ID === 'losi-signup-btn') {
            signUpSupplierIDTextboxContainer.style.display = 'flex';
            signUpSupplierIDTextbox.setAttribute('required', 'true');

            signInSupplierIDTextboxContainer.style.display = 'none';
            signInSupplierIDTextbox.removeAttribute('required');
        } else {
            signInSupplierIDTextboxContainer.style.display = 'flex';
            signInSupplierIDTextbox.setAttribute('required', 'true');

            signUpSupplierIDTextboxContainer.style.display = 'none';
            signUpSupplierIDTextbox.removeAttribute('required');
        }
    }
}