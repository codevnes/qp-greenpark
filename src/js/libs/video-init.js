import videojs from 'video.js';
import 'video.js/dist/video-js.css';

export default function initVideoJS() {
  const players = document.querySelectorAll('.video-js');
  if (players.length > 0) {
    players.forEach(player => {
      videojs(player, {
        controls: false,
        autoplay: true,
        muted: true,
        loop: true,
        fluid: true
      });
    });
  }
} 