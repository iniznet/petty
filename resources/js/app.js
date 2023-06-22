import "vite/modulepreload-polyfill";
import "@/scss/app.scss";

import alpine from "alpinejs";
import flamethrower from "flamethrower-router";

window.Alpine = alpine;
alpine.start();
flamethrower({
    prefetch: true,
});