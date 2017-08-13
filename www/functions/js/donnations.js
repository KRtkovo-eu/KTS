var quotas = [
  "Město Nový Jičín formou GRANTU",
  "Obecní úřad Bartošovice",
  "Obecní úřad Šenov u Nového Jičína",
  "Obecní úřad Starý Jičín",
  "Ing. Kateřina Konečná - poslankyně Evropského parlamentu",
  "COMang, s.r.o. Nový Jičín - pan Josef valčík",
  "Česká spořitelna a.s. - pobočka Nový Jičín",
  "Internova Morava, s.r.o. Nový Jičín",
  "ComCD - celní deklarace, s.r.o. - paní Ludmila Vychytilová",
  "RASK - PUL, a.s. Nový Jičín - pan Vladimír Uhlár",
  "GEDOS Nový Jičín - stavební společnost a.s."
];

function getDonator() {
  var i = 0;

  window.setInterval(function () {
    //if(i==0) {
    //  $('#donator').text(quotas[i]);
    //}
    //else {
      $('#donator').fadeOut(500, function() {
        $('#donator').text(quotas[i]).fadeIn(500);
      });
    //}
    i = swap(quotas, i);
  }, 4500);
}

function swap(quotas, i) {
    return (i + 1) % quotas.length;
}