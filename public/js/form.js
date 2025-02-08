export const OpenModal = (id_modal) => {
    const modal = document.getElementById(id_modal);
    if (modal) {
        modal.classList.add("grid");
        modal.classList.remove("hidden");
    }
};

export const CloseModal = (id_modal) => {
    const modal = document.getElementById(id_modal);
    if (modal) {
        modal.classList.add("hidden");
        modal.classList.remove("grid");
    }
};