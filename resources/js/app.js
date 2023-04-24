import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs'
import Clipboard from "@ryangjchandler/alpine-clipboard"

Alpine.plugin(Clipboard)
// import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


