import './bootstrap';

import Alpine from 'alpinejs';

// Import Toastify
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css"

// Import Boostrap Icons
import "bootstrap-icons/font/bootstrap-icons.css";

// Import SweetAlert2
import Swal from 'sweetalert2';
import 'sweetalert2/src/sweetalert2.scss'

window.Alpine = Alpine;
window.Toastify = Toastify;
window.Swal = Swal;

Alpine.start();

