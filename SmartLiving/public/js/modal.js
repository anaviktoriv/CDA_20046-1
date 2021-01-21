//----- CONSTANTS ------//
const serverURL = 'https://127.0.0.1:8000'

// ----------  -------- ACCOUNT DETAIL MODIFICATION VARIABLES ---------  ----------- //
const accountDetailsModal = document.getElementById('account-detail-modal')
const accountDetailsModalContentContainer = document.getElementById('account-details-modal-content-container')

/*  ---------- Buttons  ---------- */
const lastNameBtn = document.getElementById('modify-last-name-btn')
const firstNameBtn = document.getElementById('modify-first-name-btn')
const emailBtn = document.getElementById('modify-email-btn')
const phoneBtn = document.getElementById('modify-phone-btn')

const dismissAccountDetailsModal = document.getElementById('account-detail-modal-dismiss')
const accountDetailTitle = document.getElementById('account-detail-title')
const accountDetailLabel = document.getElementById('account-detail-label')
const accountDetailInput = document.getElementById('account-detail-input')
const submitButton = document.getElementById('account-detail-submit-button')
const accountDetailsErrorPlaceholder = document.getElementById('account-details-modal-error-placeholder')

//Array of possible data attributes on the account page and corresponding values to fill in the information in change account detail modal
const dataTypes = {
    'last-name': {
        'title': 'Changer le nom',
        'label': 'Nom :',
    },
    'first-name': {
        'title': 'Changer le prénom',
        'label': 'Prénom :',
    },
    'email': {
        'title': 'Changer E-mail',
        'label': 'E-mail :',
    },
    'phone': {
        'title': 'Changer le numéro de téléphone',
        'label': 'Numéro de téléphone :',
    },

}

//array of label values and corresponding keys to be used as a first parameter to send via AJAX to change the corresponding value in the db
const accountData = {
    'lastName': 'Nom',
    'firstName': 'Prénom',
    'email': 'E-mail',
    'phone': 'Numéro de téléphone',

}


// ------------- ---------- DROPDOWN ----------- -------------- //

document.addEventListener('DOMContentLoaded', function () {

    //////////////////////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(element => element.addEventListener('click', function (e) {
        e.stopPropagation();
    }));

    // make it as accordion for smaller screens
    document.querySelectorAll('.dropdown-toggle').forEach(element => element.addEventListener('click', toggleSubMenuMobile));

    function toggleSubMenuMobile(e) {
        if (window.innerWidth < 992) {
            e.preventDefault();
            let nextElement = this.nextElementSibling;
            if (nextElement.classList.contains('submenu')) {
                nextElement.style.display = nextElement.style.display === 'block' ? 'none' : 'block';
            }
        }
    }
});

// ----------  -------- ACCOUNT DETAIL MODIFICATION ---------  ----------- //

if (dismissAccountDetailsModal) {
    dismissAccountDetailsModal.addEventListener('click', () => {
        accountDetailsModal.style.display = 'none'
        document.querySelector('body').classList.remove('overflow-hidden')
    })
}

/* ----------------   CHANGE LAST NAME ----------------- */
if (lastNameBtn) {
    lastNameBtn.addEventListener('click', (event) => {
        fillInModalWithRelevantInfo('data-value', 'data-type', lastNameBtn)
    })
}

/* ----------------   CHANGE FIRST NAME ----------------- */
if (firstNameBtn) {
    firstNameBtn.addEventListener('click', (event) => {
        fillInModalWithRelevantInfo('data-value', 'data-type', firstNameBtn)
    })
}

/* ----------------   CHANGE EMAIL ----------------- */
if (emailBtn) {
    emailBtn.addEventListener('click', (event) => {
        fillInModalWithRelevantInfo('data-value', 'data-type', emailBtn)
    })
}

/* ----------------   CHANGE Phone ----------------- */
if (phoneBtn) {
    phoneBtn.addEventListener('click', (event) => {
        fillInModalWithRelevantInfo('data-value', 'data-type', phoneBtn)
    })
}

/* ------------ Submit changed account details --------------- */
if (submitButton) {
    submitButton.addEventListener('click', (event) => {
        event.preventDefault()
        submitAccountDetails()
    })
}


function fillInModalWithRelevantInfo(attribute1, attribute2, triggerNode) {

    //show the modal
    accountDetailsModal.style.display = 'block'
    document.querySelector('body').classList.add('overflow-hidden')

    const parent = triggerNode.parentNode
    const value = parent.getAttribute(attribute1)
    const dataType = parent.getAttribute(attribute2)
    accountDetailTitle.innerHTML = dataTypes[dataType].title
    accountDetailLabel.innerHTML = dataTypes[dataType].label
    accountDetailInput.value = value

    console.log(value, dataType)

}

function submitAccountDetails() {
    let key = accountDetailLabel.innerHTML
    const value = accountDetailInput.value

    //get the correct key (which will let us know wich property to change to send as a param
    key = key.slice(0, -2)
    const propertyToUpdate = getKeyByValue(accountData, key)
    console.log(propertyToUpdate)

    let xhr = new XMLHttpRequest()
    const url = serverURL + '/account/change' + '/' + propertyToUpdate + '/' + value

    xhr.open('POST',  url, true);

    xhr.onload = function () {
        console.log(xhr.status)
        if (xhr.status == 200){
            console.log(xhr.responseText)

            const parsedResponse = JSON.parse(xhr.responseText)
            const success = parsedResponse.success
            const message = parsedResponse.message
            const validationError = parsedResponse.validationError

            if (success){
                deleteAllChildNodes(accountDetailsModalContentContainer)
                appendImageAndMessage(accountDetailsModalContentContainer, '../images/icons/check-success-icon.svg', message )
            } else {
                if(validationError){
                  console.log(validationError)
                    accountDetailsErrorPlaceholder.innerHTML = message
                    accountDetailsErrorPlaceholder.classList.add('alert', 'alert-danger')
                } else {
                    deleteAllChildNodes(accountDetailsModalContentContainer)
                    appendImageAndMessage(accountDetailsModalContentContainer, '../images/icons/error-icon.svg', 'Une erreur est survenue. Veillez essayer plus tard.' )
                }

            }

            setTimeout(function() {
                window.location.reload()
            }, 900);
        }
    }

    xhr.send()
}

function getKeyByValue(object, value) {
    return Object.keys(object).find(key => object[key] === value);
}

function deleteAllChildNodes(parentNode) {
    parentNode.querySelectorAll('*').forEach(n => n.remove())
}

function appendImageAndMessage(parentNode, imgName, message) {
    let newTextAndImgWrapper = document.createElement("div")
    newTextAndImgWrapper.setAttribute("class", "text-center text-dark d-flex flex-column h5 mt-5 mb-4")

    let newImage = document.createElement("IMG")
    newImage.setAttribute("src", imgName)
    newImage.setAttribute("width", "100")
    newImage.setAttribute("height", "100")
    newImage.setAttribute("alt", "success")
    newImage.setAttribute("class", "mx-auto mt-2 mb-4")
    newTextAndImgWrapper.appendChild(newImage)
    let newParagraph = document.createTextNode(message)
    newTextAndImgWrapper.appendChild(newParagraph)

    parentNode.appendChild(newTextAndImgWrapper)
}

/*() => {
    accountDetailsModal.style.display = 'block'
    const parent = lastNameBtn.parentNode
    const lastName = parent.getAttribute('data-user-last-name')
    const dataType = parent.getAttribute('data-type')
    accountDetailTitle.innerHTML = dataTypes[dataType].title
    accountDetailLabel.innerHTML = dataTypes[dataType].label
    accountDetailInput.value = lastName
}*/