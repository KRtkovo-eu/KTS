var darci = [
  "ObecnĂ­ ĂšĹ™ad BartoĹˇovice",
  "ObecnĂ­ ĂšĹ™ad StarĂ˝ JiÄŤĂ­n",
  "ObecnĂ­ ĂšĹ™ad Ĺ enov u NovĂ©ho JiÄŤĂ­na",
  "Ing. KateĹ™ina KoneÄŤnĂˇ, poslankynÄ› Parlamentu ÄŚR",
  "RASK-PUL a.s. NovĂ˝ JiÄŤĂ­n - Ing. VladimĂ­r UhlĂˇr",
  "COMang s.r.o. NovĂ˝ JiÄŤĂ­n - p. Josef ValÄŤĂ­k",
  "GEDOS N.J. stav. spoleÄŤ. a. s. - p. Radek Toman",
  "ComCD - cel. dekl. s.r.o. - p. Ludmila VychytilovĂˇ",
  "V a V, staveb. spoleÄŤnost N.J. - Ing. AntonĂ­n Vrba",
  "manĹľelĂ© Radislav a Marie Ĺ kĂˇrkovi, NovĂ˝ JiÄŤĂ­n",
  "ASOMPO, a.s. â€“ Ĺ™Ă­zenĂˇ sklĂˇdka Ĺ˝ivotice",
  "DuĹˇan Vinklar â€“ HEROS, f.o. NovĂ˝ JiÄŤĂ­n",
  "NC LINE s.r.o., Suchdol n. Odrou",
  "Q-VAT spol. s r.o., NovĂ˝ JiÄŤĂ­n",
  "PaedDr. JiĹ™Ă­ VĂˇvra",
  "AnastĂˇzie KovĂˇĹ™ovĂˇ"
];


function setDonator(){
  min = 0;
  max = darci.length;
  random = min + Math.floor(Math.random() * (max - min + 1));
  return darci[random];
}

function getDonator() {
  //$('#donator').repeat(4000,true).fadeOut('slow').css('display','none').text(setDonator()).fadeIn('slow').css('display','inline');
  var i = 0;

  i = swap(darci, i);
  window.setInterval(function () {
      i = swap(darci, i);
  }, 4000);
}

function swap(darci, i) {
    $('#donator').text(darci[i]).fadeIn(500).delay(2500).fadeOut(500);
    return (i + 1) % darci.length;
}