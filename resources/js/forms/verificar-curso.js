import { notificacion } from "../services/funcs.js";
import { POST_URLS, GET_URLS } from "../services/api.js";

const verificarCurso = document.getElementById("verificar-curso");

verificarCurso.addEventListener("submit", (event) => {
    event.preventDefault();

    const idCurso = verificarCurso.getAttribute("data-id");
    const csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch(POST_URLS.VERIFICARCURSO, {
        method: "POST",
        headers: {
            "Application-Type": "application/json",
            "X-CSRF-TOKEN": csrf,
            Accept: "application/json",
        },
        body: JSON.stringify({
            idCurso: idCurso,
        }),
    })
        .then((response) => {
            if (response.status === 200) {
                notificacion("Curso verificado correctamente", "success");
                event.target.reset();
                return (window.location.replace = GET_URLS.CURSOS);
            }
            return response.json();
        })
        .then((data) => {
            if (data.errors) {
                notificacion("No se pudo verificar el curso", "error");
                console.log(data.errors);
            }
            console.log(data);
        })
        .catch((error) => console.error(error))
        .finally(() => {
            console.log("finalizado");
        });
});
