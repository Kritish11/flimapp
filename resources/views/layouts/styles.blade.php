<style>
    .cartoon-font { font-family: 'Fredoka One', cursive; }
    .clean-font { font-family: 'Poppins', sans-serif; }

    .sidebar-active {
        background-color: rgb(139 92 246);
        color: white;
    }

    .sidebar-active:hover {
        background-color: rgb(139 92 246) !important;
        color: white !important;
    }

    .modal {
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .modal.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-content {
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s ease;
    }

    .modal-content.active {
        transform: scale(1);
        opacity: 1;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    @media (max-width: 768px) {
        .transform {
            transition-property: transform;
            transition-duration: 300ms;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    }

    .modal-backdrop {
        background-color: rgba(0, 0, 0, 0);
        opacity: 0;
        transition: all 0.3s ease-in-out;
    }

    .modal-backdrop.active {
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 1;
    }

    /* Bottom Sheet Styles */
    #bottomSheet {
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    @media (min-width: 768px) {
        #bottomSheet {
            max-width: 500px;
            left: 50%;
            transform: translateX(-50%) translateY(100%);
            border-radius: 12px;
            margin: 2rem auto;
        }

        #bottomSheet.translate-y-0 {
            transform: translateX(-50%) translateY(0);
        }
    }

    /* Simple Modal Animation */
    #categoryModal {
        transition: opacity 0.2s ease;
    }

    #categoryModal.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #categoryModal:not(.hidden) {
        opacity: 1;
        pointer-events: auto;
    }
</style>
