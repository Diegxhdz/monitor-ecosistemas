document.addEventListener("DOMContentLoaded", () => {
    const selectLayer = document.getElementById("layer");
    const img = document.getElementById("preview");
    const mapLink = document.getElementById("map-link");
    const mapBtn = document.getElementById("view-map-btn");
    const placeholder = document.getElementById("placeholder-text");

    const capas = {
        "temperatura": { img: "images/temperaturas.png", url: "https://simar.conabio.gob.mx/explorer/" },
        "ph": { img: "images/ph.png", url: "https://simar.conabio.gob.mx/explorer/" },
        "o2": { img: "images/o2.png", url: "https://simar.conabio.gob.mx/explorer/" },
        "coral": { img: "images/coral.png", url: "https://simar.conabio.gob.mx/explorer/" }
    };

    selectLayer.addEventListener("change", () => {
        const layer = selectLayer.value;
        if (!layer || !capas[layer]) return;

        // Eliminar opción por defecto una vez seleccionada
        const defaultOption = selectLayer.querySelector('option[value=""]');
        if (defaultOption) defaultOption.remove();

        // Transición suave
        img.style.opacity = 0;
        setTimeout(() => {
            img.src = capas[layer].img;
            img.onload = () => (img.style.opacity = 1);
        }, 300);

        mapLink.href = capas[layer].url;
        mapLink.style.display = "inline";
        mapBtn.style.display = "block";
        placeholder.style.display = "none";
        mapBtn.onclick = () => window.open(capas[layer].url, "_blank");
    });
});