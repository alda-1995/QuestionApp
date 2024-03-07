import { gsap } from "gsap";

function animationAlert() {
    const alerts = document.querySelector(".alert-display");
    if (!alerts)
        return;
    const tlAlertAnimation = gsap.timeline();
    tlAlertAnimation.to(".alert-display", { opacity: 1, right: "5%", x: 0, duration: 1 });
    tlAlertAnimation.to(".alert-display", { opacity: 0, x: "100%", right: 0, duration: 1, delay: 4 });
}

animationAlert();

let submitDeleteTest = null;

const btnStepOne = document.getElementById("btnFirstStep");
if (btnStepOne) {
    btnStepOne.addEventListener("click", function (e) {
        e.preventDefault();
        const email = document.getElementById("email");
        if (!validateRequired(email)) {
            showError("El correo es requerido", "error-email", email);
            return;
        }
        if (!validateEmail(email.value)) {
            showError("El correo es inválido", "error-email", email);
            return;
        }
        clearErrors();
        gsap.to("#lineProgress", { duration: 0.8, width: "35%" })
        const tlOne = gsap.timeline();
        tlOne.to("#first-step", { opacity: 0, xPercent: 20, duration: 1 });
        tlOne.set("#second-step", { zIndex: 2 });
        tlOne.to("#second-step", { opacity: 1, duration: 1 });
        tlOne.set("#first-step", { zIndex: -1 });
    });
}

const btnStepTwo = document.getElementById("btnSecondStep");
if (btnStepTwo) {
    btnStepTwo.addEventListener("click", function (e) {
        e.preventDefault();
        const name = document.getElementById("name");
        if (!validateRequired(name)) {
            showError("El nombre es requerido", "error-name", name);
            return;
        }
        clearErrors();
        gsap.to("#lineProgress", { duration: 0.8, width: "70%" })
        const tlTwo = gsap.timeline();
        tlTwo.to("#second-step", { opacity: 0, xPercent: 20, duration: 1 });
        tlTwo.set("#three-step", { zIndex: 2 });
        tlTwo.to("#three-step", { opacity: 1, duration: 1 });
        tlTwo.set("#second-step", { zIndex: -1 });
    });
}

const formRegister = document.querySelector("[data-form-register]");
if (formRegister) {
    formRegister.addEventListener("submit", function (e) {
        e.preventDefault();
        const password = document.getElementById("password");
        const passwordConfirm = document.getElementById("passwordConfirm");
        if (!validateRequired(password)) {
            showError("La contraseña es requerida", "error-password", password);
            return;
        }
        if (!validateLength(password, 8)) {
            showError("La contraseña debe tener al menos 8 caracteres", "error-password", password);
            return;
        }
        if (!validateRequired(passwordConfirm)) {
            showError("Confirma la contraseña", "error-password-confirm", passwordConfirm);
            return;
        }
        clearErrors();
        if (!validateConfirmPassword(password.value, passwordConfirm.value)) {
            showError("Las contraseñas no coinciden", "error-password-confirm", password);
            return;
        }
        clearErrors();
        gsap.to("#lineProgress", { duration: 0.8, width: "100%" });
        e.currentTarget.submit();
    });
}

const validateEmail = (value) => {
    const expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return expresionRegular.test(value);
};

const validateRequired = (input) => {
    if (input.value.trim() === '') {
        return false;
    }
    return true;
};

const validateLength = (input, minLength) => {
    const value = input.value.trim();
    const length = value.length;
    if (length < minLength) {
        return false;
    }
    return true;
};

const validateConfirmPassword = (password, confirmPassword) => {
    if (password !== confirmPassword) {
        return false;
    }
    return true;
};

const showError = (value, id, element) => {
    const errorGeneral = document.getElementById(id);
    errorGeneral.innerText = value;
    element.classList.add("error-input");
};

const clearErrors = () => {
    document.querySelectorAll("input").forEach(element => {
        element.classList.remove("error-input");
    });
    document.querySelectorAll('span[role="alert"]').forEach(element => {
        element.innerText = "";
    });
};

const dropDowns = document.querySelector('[data-dropdown-toggle]');
if (dropDowns) {
    document.querySelector('[data-dropdown-toggle]').addEventListener("click", function (e) {
        e.preventDefault();
        var submenu = document.getElementById("dropdown-user");
        if (submenu) {
            submenu.classList.toggle("hidden");
        }
    });
}

const btnLogout = document.getElementById("btnLogout");
if (btnLogout) {
    btnLogout.addEventListener("click", function (e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
}


const btnOpenQuestion = document.getElementById("openModalQuestion");
if (btnOpenQuestion) {
    btnOpenQuestion.addEventListener("click", function (e) {
        e.preventDefault();
        openModalGeneral("modalQuestion");
    });
}

const openModalGeneral = (id) => {
    const modalQuestion = document.getElementById(id);
    modalQuestion.classList.add("open-modal");
};

const closeModalGeneral = (id) => {
    const modalQuestion = document.getElementById(id);
    modalQuestion.classList.remove("open-modal");
};

const formsDelete = document.querySelectorAll(".formsDelete");
if(formsDelete){
    formsDelete.forEach(function(element){
        element.addEventListener("submit", function(e){
            e.preventDefault();
            openModalGeneral("modalConfirmTest");
            submitDeleteTest = e.currentTarget;
        });
    });
}

const btnConfirmTestDelete = document.getElementById("btnDeleteTest");
if(btnConfirmTestDelete){
    btnConfirmTestDelete.addEventListener("click", function(e){
        e.preventDefault();
        console.log(submitDeleteTest);
        submitDeleteTest.submit();
    });
}

const btnCloseConfirmTest = document.getElementById("closeConfirmTest");
if(btnCloseConfirmTest){
    btnCloseConfirmTest.addEventListener("click", function(e){
        e.preventDefault();
        closeModalGeneral("modalConfirmTest");
    });
}

const btnCloseModalPreguntas = document.getElementById("closeModalPreguntas");
if(btnCloseModalPreguntas){
    btnCloseModalPreguntas.addEventListener("click", function(e){
        e.preventDefault();
        closeModalGeneral("modalQuestion");
    });
}

const btnFormSave = document.querySelectorAll(".btn-form");
if(btnFormSave.length > 0){
    btnFormSave.forEach(element => {
        element.addEventListener("click", function(e){
            e.preventDefault();
            var formParent = document.getElementById("formParent");
            formParent.submit();
        });
    });   
}

// const btnEditQuestions = document.querySelectorAll(".edits-questions");
// if(btnEditQuestions.length > 0){
//     btnEditQuestions.forEach(element => {
//         element.addEventListener("click", function(e){
//             e.preventDefault();
//             const idCardQuestion = element.getAttribute("data-card");
//             const cardQuestion = document.getElementById("card-question-"+idCardQuestion);
//             const nameQuestion = cardQuestion.querySelector('.title-question').textContent;
//             const questionA = cardQuestion.querySelector('.respuesta-a span').textContent;
//             const questionB = cardQuestion.querySelector('.respuesta-b span').textContent;
//             const questionC = cardQuestion.querySelector('.respuesta-c span').textContent;
//             console.log(cardQuestion);
//             console.log(nameQuestion);
//             console.log(questionA);
//             console.log(questionB);
//             console.log(questionC);
//         });
//     });
// }

const btnMenu = document.getElementById("btnMenu");
let openMenu = false;
if(btnMenu.addEventListener("click", function(e){
    e.preventDefault();
    if(!openMenu){
        openMenu = true;
        gsap.to("#sidenav", { duration: 1, x: "0%" });
    }else{
        openMenu = false;
        gsap.to("#sidenav", { duration: 1, x: "-100%" });
    }
}));

