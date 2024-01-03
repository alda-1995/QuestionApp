import { gsap } from "gsap";

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
        openModalQuestion();
    });
}

const openModalQuestion = () => {
    const modalQuestion = document.getElementById("modalQuestion");
    modalQuestion.classList.add("open-modal");
};

const closeModalQuestion = () => {
    const modalQuestion = document.getElementById("modalQuestion");
    modalQuestion.classList.remove("open-modal");
};

const formQuestion = document.getElementById("formQuestion");
const emptyQuestion =  document.getElementById("emptyQuestion");
if (formQuestion) {
    const containerQuestion = document.getElementById("listPreguntas");
    formQuestion.addEventListener("submit", function (e) {
        e.preventDefault();
        const itemQuestion = creteQuestionItem();
        if(itemQuestion === null)
        return;
        if(emptyQuestion)
            emptyQuestion.remove();
        containerQuestion.appendChild(itemQuestion);
        closeModalQuestion();
    });
}

let numberInputs = 0;
const creteQuestionItem = () => {
    const valueInputPregunta = document.querySelector('input[name="nombre_pregunta"]').value;
    const valueRespuestaA = document.querySelector('input[name="respuesta_a"]').value;
    const valueRespuestaB = document.querySelector('input[name="respuesta_b"]').value;
    const valueRespuestaC = document.querySelector('input[name="respuesta_c"]').value;
    const respuestaCorrecta = document.querySelector("input[type='radio'][name=respuesta_correcta]:checked").value;
    const divParentInput = createDiv('flex flex-col mb-2 2xl:mb-4');
    divParentInput.innerHTML = `
    <div class="flex bg-white">
        <div class="w-1 bg-secondary flex-shrink-0"></div>
        <div class="flex-grow p-4 flex items-center">
            <div class="flex-grow">
                <h3 class="text-neutral parrafo">${valueInputPregunta}</h3>
                <input type="text" name="preguntas[${numberInputs}][nombre]" class="hidden" 
                value="${valueInputPregunta}">
                <input type="text" name="preguntas[${numberInputs}][respuesta_a]" class="hidden" 
                value="${valueRespuestaA}">
                <input type="text" name="preguntas[${numberInputs}][respuesta_b]" class="hidden" 
                value="${valueRespuestaB}">
                <input type="text" name="preguntas[${numberInputs}][respuesta_c]" class="hidden" 
                value="${valueRespuestaC}">
                <input type="text" name="preguntas[${numberInputs}][respuesta_correcta]" class="hidden" 
                value="${respuestaCorrecta}">
            </div>
            <div class="flex-shrink-0 flex gap-2 md:gap-4 ml-4">
                <button type="button" id="question" class="btn-secondary edit">
                    <div class="flex mr-1">
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>text-box-edit</title>
                            <path d="M10 19.11L12.11 17H7V15H14V15.12L16.12 13H7V11H17V12.12L18.24 10.89C18.72 10.41 19.35 10.14 20.04 10.14C20.37 10.14 20.7 10.21 21 10.33V5C21 3.89 20.1 3 19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H10V19.11M7 7H17V9H7V7M21.7 14.35L20.7 15.35L18.65 13.3L19.65 12.3C19.86 12.09 20.21 12.09 20.42 12.3L21.7 13.58C21.91 13.79 21.91 14.14 21.7 14.35M12 19.94L18.06 13.88L20.11 15.93L14.06 22H12V19.94Z"></path>
                        </svg>
                    </div>
                    Editar
                </button>
                <button type="button" id="question" class="btn-secondary delete">
                    <div class="flex mr-1">
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>close</title>
                            <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path>
                        </svg>
                    </div>
                    Eliminar
                </button>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 mt-2">
        <p class="parrafo text-neutral">A - ${valueRespuestaA}</p>
        <p class="parrafo text-neutral">B - ${valueRespuestaB}</p>
        <p class="parrafo text-neutral">C - ${valueRespuestaC}</p>
        <p class="text-secondary btn-font mt-2">Respuesta correcta - ${respuestaCorrecta}</p>
    </div>
    `;
    numberInputs += 1;
    return divParentInput;
};

const createDiv = (className) => {
    const divCreate = document.createElement("div");
    divCreate.className = className;
    return divCreate;
};