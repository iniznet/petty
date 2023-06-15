import "vite/modulepreload-polyfill";
import "@/scss/app.scss";

import alpine from "alpinejs";

window.Alpine = alpine;
alpine.start();