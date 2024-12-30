import { POST_URLS } from "../services/api.js";
import { notificacion } from "../services/funcs.js";
let csrf = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

// Revisar el id dragDrop para ver si se subió un archivo
const dragDrop = document.getElementById("dragDrop");
const inputFilePortada = document.getElementById("filePortada");

dragDrop.onclick = () => {
    inputFilePortada.click();
};

dragDrop.onchange = () => {
    console.log(inputFilePortada.files);
};

const btnSubirCurso = document.getElementById("btnSubirCurso");
const formSubirCurso = document.getElementById("formSubirCurso");

formSubirCurso.addEventListener("submit", (event) => {
    event.preventDefault();

    const formData = new FormData(event.target);

    fetch(POST_URLS.SUBIRCURSO, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf,
            Accept: "application/json",
        },
        body: formData,
    })
        .then((response) => {
            if (response.status === 200) {
                notificacion("Curso subido correctamente", "success");
                event.target.reset();
                const labels = formSubirCurso.querySelectorAll("label");
                labels.forEach((label) => {
                    if (label.querySelector("li")) {
                        label.querySelector("li").remove();
                    }
                });
                return response.json();
            }
            return response.json();
        })
        .then((data) => {
            if (data.errors) {
                notificacion("No se pudo crear el curso", "error");
                console.log(data.errors);
                const labels = formSubirCurso.querySelectorAll("label");
                labels.forEach((label) => {
                    const nodeElement = label.querySelectorAll(
                        "input, textarea, select"
                    )[0].name;
                    console.log(nodeElement);

                    if (label.querySelector("li")) {
                        console.log(label.querySelector("li"));
                        label.querySelector("li").remove();
                    }

                    if (data.errors[nodeElement]) {
                        label.insertAdjacentHTML(
                            "beforeend",
                            `<li class="absolute bottom-0 left-4 text-red-500 text-xs italic">${data.errors[nodeElement]}</li>`
                        );
                    }
                });
            }
            console.log(data);
        })
        .catch((error) => console.error(error))
        .finally(() => {
            console.log("finalizado");
        });
});
