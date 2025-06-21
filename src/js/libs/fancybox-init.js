import $ from 'jquery';
import { Fancybox } from '@fancyapps/ui';
import '@fancyapps/ui/dist/fancybox/fancybox.css';

export default function initFancybox() {
  Fancybox.bind('[data-fancybox]', {
    animationEffect: "zoom-in-out",
    transitionEffect: "fade",
    loop: true,
    buttons: [
      "zoom",
      "slideShow",
      "fullScreen",
      "download",
      "thumbs",
      "close"
    ],
    btnTpl: {
      download: `<a download class="fancybox-button fancybox-button--download" title="Download" href="javascript:;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 16L7 11h4V5h2v6h4L12 16z"/><path d="M20 18H4v-7H2v7c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-7h-2v7z"/></svg>
      </a>`
    },
    caption: function (instance, item) {
      return $(this).data('caption');
    }
  });
} 