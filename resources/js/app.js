import Reverb from 'reverb-js';

// Reverb ile chat kanalını dinle
const reverb = new Reverb('your-reverb-url');  // Reverb URL'nizi buraya ekleyin

reverb.subscribe('chat', function(message) {
    Livewire.emit('refreshMessages', message);  // Yeni gelen mesajı Livewire komponentine gönderiyoruz
});