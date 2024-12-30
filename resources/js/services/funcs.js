export function notificacion(message, type) {
    let getNotificacion = document.getElementById("alert-3");

    if (getNotificacion) getNotificacion.remove();

    let notificacion = document.createElement("div");

    notificacion.innerHTML = `
        <div id="alert-3" class="alert-fetch fixed left-[50%] top-[25px] translate-x-[-50%] z-[1] w-[90%] md:w-auto flex items-center p-4 mb-4 rounded-lg bg-gray-800 ${
            type === "success" ? "text-green-400" : "text-red-400"
        } z-[2]" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium text-white">
                ${message}
            </div>
        </div>
    `;

    let child = notificacion.childNodes[1];

    document.body.appendChild(notificacion);

    setTimeout(() => {
        child.classList.add("fadeOut");
    }, 4700);

    setTimeout(() => {
        notificacion.remove();
    }, 5000);
}
