function printContent(el) {
    var restorepage = $('body').html();
    var printContent = $('#' + el).clone();
    // let M = document.getElementById("M")
    // let S = document.getElementById("S")
    // let D = document.getElementById("D")
    // let E = document.getElementById("E")
    // M.style.display="none";
    // S.style.display="none";
    // D.style.display="none";
    // E.style.display="none";
    $('body').empty().html(printContent);
    window.print();
    $('body').html(restorepage);
    
}