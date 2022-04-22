require("./bootstrap");

import Alpine from "alpinejs";
import { initial } from "lodash";

import * as FilePond from "filepond";
import zh_CN from "filepond/locale/zh-cn.js";
import "filepond/dist/filepond.min.css";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

window.Alpine = Alpine;
FilePond.registerPlugin(FilePondPluginImagePreview);
FilePond.registerPlugin(FilePondPluginFileValidateType);

FilePond.setOptions(zh_CN);

window.FilePond = FilePond;
Alpine.start();
