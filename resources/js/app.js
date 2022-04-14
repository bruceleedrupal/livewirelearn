require("./bootstrap");

import Alpine from "alpinejs";
import collapse from "@alpinejs/collapse";
import { initial } from "lodash";

window.Alpine = Alpine;

Alpine.plugin(collapse);
Alpine.directive("uppercase", (el) => {
    el.textContent = el.textContent.toUpperCase();
});

Alpine.start();

console.log(ClassicEditor);
