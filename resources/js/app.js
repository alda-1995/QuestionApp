import { gsap } from "gsap";
import Validator from 'vanillajs-validation';

const btnStepOne = document.getElementById("btnFirstStep");
btnStepOne.addEventListener("click", function (e) {
    e.preventDefault();
    const email = document.getElementById("email");
    if(!validateRequired(email)){
        showError("El correo es requerido", "error-email", email);
        return;
    }
    if(!validateEmail(email.value)){
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

const btnStepTwo = document.getElementById("btnSecondStep");
btnStepTwo.addEventListener("click", function (e) {
    e.preventDefault();
    const name = document.getElementById("name");
    if(!validateRequired(name)){
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

const formRegister = document.querySelector("[data-form-register]");
formRegister.addEventListener("submit", function (e) {
    e.preventDefault();
    const password = document.getElementById("password");
    const passwordConfirm = document.getElementById("passwordConfirm");
    if(!validateRequired(password)){
        showError("La contraseña es requerida", "error-password", password);
        return;
    }
    if(!validateLength(password, 8)){
        showError("La contraseña debe tener al menos 8 caracteres", "error-password", password);
        return;
    }
    if(!validateRequired(passwordConfirm)){
        showError("Confirma la contraseña", "error-password-confirm", passwordConfirm);
        return;
    }
    clearErrors();
    if(!validateConfirmPassword(password.value, passwordConfirm.value)){
        showError("Las contraseñas no coinciden", "error-password-confirm", password);
        return;
    }
    clearErrors();
    gsap.to("#lineProgress", { duration: 0.8, width: "100%" });
    e.currentTarget.submit();
});


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
    if(password !== confirmPassword){
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